<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Jobs\SendEmailRegisterJob;
use App\Jobs\EmailUserConfirmRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Mail\LoginMail;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {


        if (isset($request['front_image'])) {
            $file = $request->file('front_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(9) . '.' . $extension;
            $path = public_path() . '/images/users/';
            $uplaod = $file->move($path, $fileName);
        }
        if (isset($request['back_image'])) {
            $file = $request->file('back_image');
            $extension = $file->getClientOriginalExtension();
            $fileName1 = Str::random(9) . '.' . $extension;
            $path = public_path() . '/images/users/';
            $uplaod = $file->move($path, $fileName1);
        }

        $user = User::create([
            'full_name' => $request['full_name'],
            'mobile' => $request['mobile'],
            'gender' => $request['gender'],
            'birth_date' => $request['birth_date'],
            'bank_name' => $request['bank_name'],
            'bank_account' => $request['bank_account'],
            'email' => $request['email'],
            'country' => $request['country'],
            'password' => bcrypt($request['password']),
            'front_image' => $fileName,
            'back_image' => $fileName1,
            'is_active' => 0
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token
        ];


        $details['email'] = "cbbmobi2023@gmail.com" ;
        $dynamicData = [
            'full_name' => $user->full_name,
            'mobile' => $user->mobile,
            'bank_name' => $user->bank_name,
            'bank_account' => $user->bank_account,
            'gender' => $user->gender,
            'country' => $user->country,
            'birth_date' => $user->birth_date,
            'email' => $user->email,
            'front_image' => URL::to('/') . '/images/users/' .$user->front_image,
            'back_image' => URL::to('/') . '/images/users/' .$user->back_image,
            
        ];
        // dispatch(new SendEmailRegisterJob($data,$details));
        dispatch(new SendEmailRegisterJob($dynamicData,$details));
        $emailUser['email'] = $user->email ;
        dispatch(new EmailUserConfirmRegister($dynamicData,$emailUser));

        return response()->json(['message' => 'Registration Request Send Successfully .... please Wait for Activate Account', 'data' => $data, 'status' => 201], 201);
    }

    public function login(LoginRequest $request)
    {

        //Check Email 
        $user = User::Where('email', $request->email)->first();
        //Check Password 
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid Email or Password ...!! ',
                'data' => ""
            ], 401);
        }
        $token = $user->createToken($user->email . '_Token')->plainTextToken;
  

        if ($user->is_active !== 1) {
            return response()->json([
                'status' => 422,
                'data' => "",
                'message' => 'Account Do not Activate Yet Please Wait ... '

            ], 422);
        }

            // $mailData = [
            //     'title'=> 'Logged in from user' ,
            //     'body' => 'user logged in from '. $user->email ,
                
            // ];
        

        // dd('send success');
    //       // Send email
    // Mail::raw('Logged in successfully', function ($message) use ($user) {
    //     $message->to('raghadbaizouk@gmail.com')
    //         ->subject('Login from User')
    //         ->from($user->email);
    //         // You can modify the 'from' email address as per your preference
    // });



        return response()->json([
            'status' => 200,
            'data' => $user,
            'token' => $token,
            'message' => 'Logged in Successfully ... '

        ], 200);
    }


    public function logout(Request $request)
    {
        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function myProfile()
    {
        $user= User::find(auth()->user()->id);
        return response()->json(['data'=>new UserResource($user) , 'status'=>200],200);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if (isset($request->personal_image)) {
            $file = $request->file('personal_image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = Str::random(9) . '.' . $extension;
            $path = public_path('/images/users/');

            $uplaod = $file->move($path, $fileName);
            if (File::exists(public_path('images/users/' . $user->personal_image))) {
                File::delete(public_path('images/users/' . $user->personal_image));
            }
            $user->personal_image  = $fileName;
        }


        $user->save();

        return response()->json(['message'=>"Profile updated Successfully..." , 'data'=>$user , 'status'=>201],201);
    }


}
