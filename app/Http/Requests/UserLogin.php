<?php

namespace App\Http\Requests;

use App\Models\OTP;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\UnauthorizedException;

class UserLogin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      

        if($this->otp) {
            $otp = OTP::where('otp',$this->otp)->notExpired()->first();
            
            if(!$otp) {
                throw new UnauthorizedException('Failed to validate OTP');
            }

            auth()->loginUsingId($otp->user_id);

            return true;

        }

        if(auth()->attempt($this->only(['email','password']))) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|email|exists:users,email',
            'password'=>'required_if:otp,null',
            'otp'=>'required_if:password,null'
        ];
    }
}
