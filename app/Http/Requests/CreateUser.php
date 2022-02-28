<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class CreateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>['email','unique:users,email','required_without:phone_number'],
            'phone_number'=>'unique:users,phone_number|required_without:email|integer',
            'name'=>'string',
            'password'=>'min:8',
        ];
    }
}