<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Contracts\Validations\Validator;
use Illuminate\Http\Exception\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;
use App\Http\Helpers\Helper;
class UserRequest extends FormRequest
{

    public function rules()
    {
        return [
            'full_name' => 'required',
            'email' => 'required|email|unique:users' ,
            'password' => 'required|min:8|confirmed',
            'bank_account' => 'required' ,
            'bank_name' => 'required' ,
            'front_image' => 'required' ,
            'back_image' => 'required' ,
            'mobile' => 'required' ,
            'country' => 'required' ,
        ];
    }

    public function failedValidation(Validator $validator)
    {

        Helper::sendError('validation error', $validator->errors());
    }
}
