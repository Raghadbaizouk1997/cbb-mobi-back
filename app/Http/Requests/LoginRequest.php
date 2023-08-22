<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Contracts\Validations\Validator;
use Illuminate\Http\Exception\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;
use App\Http\Helpers\Helper;
class LoginRequest extends FormRequest
{

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users' ,
            'password' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {

        Helper::sendError('validation error', $validator->errors());
    }
}
