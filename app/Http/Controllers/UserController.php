<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Http\Requests\GetUserDetail;
use App\Http\Requests\VerifyUser;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Return user detail
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetUserDetail $request)
    {
        return $request->user();
    }

    /**
     * Create the new user
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateUser $request)
    {
        $user = new User();
        $user->password = Str::random(8);
        $user->fill($request->only('email', 'phone_number', 'password', 'name'));
        $user->save();

        $user->sendEmailVerificationNotification();

        activity('user')
            ->performedOn($user)
            ->causedBy($user)
            ->withProperties($request->validated())
            ->log('A new user has been created');

        return $user;
    }

    /**
     * Verify the user
     */
    public function verify(VerifyUser $request)
    {
        $verified = $request->verify();

        if ($verified) {
            activity('user')
                ->performedOn($request->user())
                ->causedBy($request->user())
                ->withProperties($request->validated())
                ->log('User has been verified');

            return ['message' => 'User has been verified'];
        }

        return ['message' => 'User has already been verified'];
    }
}
