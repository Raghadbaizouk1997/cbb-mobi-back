<?php
namespace App\Http\Helpers;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;









class Helper{


    public static function sendError($message , $errors =[] , $code = 401){

        $response = ['success'=>false , 'message'=>$message];

        if(!empty($errors)){
            $response['data'] = $errors;
        }
        // throw new HttpResponseException(response()->json([
        //     'message' =>$message ,
        //     'result' => false
        // ], 422));
        // dd(response()->json($response,$code));

         throw new HttpResponseException(response()->json($response,$code));
    }

}
