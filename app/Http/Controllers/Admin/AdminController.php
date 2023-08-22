<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    
    public function dashboard(){
        $users = User::all();
        $users = count($users);
            if(Session::has('loginId')){
            $data = Admin::where('id' , '=' ,  Session::get('loginId'))->first();
        }
        return view('dashboard.dashboard', compact('users'));
    }
}
