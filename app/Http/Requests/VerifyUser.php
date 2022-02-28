<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class VerifyUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = User::find($this->id);

        auth()->login($user);

        if (!hash_equals((string) $this->route('id'), (string) $this->user()->getKey())) {
            return false;
        }

        if (!hash_equals($this->route('hash'), sha1($this->user()->getEmailForVerification()))) {
            return false;
        }

        if ($this->user()->hasVerifiedEmail()) {
            throw new UnauthorizedHttpException('', 'User already verified');
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Fulfill the email verification request.
     *
     * @return void
     */
    public function verify()
    {
        if (!$this->user()->hasVerifiedEmail()) {
            $this->user()->markEmailAsVerified();
            event(new Verified($this->user()));
            return true;
        }

        return false;
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        return $validator;
    }
}
