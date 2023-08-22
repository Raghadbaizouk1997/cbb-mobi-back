<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class UserController extends Controller
{
    
    public function index()
    {
        $users = User::where('is_active',1)->get();
        return view('users.index', compact('users'));
    }

   

    public function show($id)
    {
        $user = User::find($id);
        // dd($technician->images);
        return view("users.show", compact('user'));
    }

    public function TechnicianRequests(){
        $users = User::where('is_active',0)->get();
        return view("users.requests",compact('users'));
    }

    public function Activate($id){
        $technician = User::find($id);
        $technician->is_Active = 1;
        $technician->save();
        return redirect()->route('users.index',$technician)->with("success",  "تم تفعيل الحساب بنجاح");
    }

}
