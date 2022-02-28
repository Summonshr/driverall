<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendOTP;
use App\Http\Requests\UserLogin;
use App\Models\User;

class AuthController extends Controller
{
    
    /**
     * Perform login of the user
     */

    public function login(UserLogin $request)
    {
        $token = $request->user()->createToken($request->get('token_name','first_device'));

        activity('user')
                ->performedOn($request->user())
                ->causedBy($request->user())
                ->withProperties($request->validated())
                ->log('Login Token has been created');
    
        return ['token' => $token->plainTextToken];
    }   

    public function loginUsingOTP(SendOTP $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        $user->sendOTP(for: 'login');

        activity('user')
                ->performedOn($user)
                ->causedBy($user)
                ->withProperties($request->validated())
                ->log('OTP has been created');

        return ['message'=>'OTP has been sent.'];
    }
}
