<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $adminService ;
  
    public function login(){
        return view('auth.login');
    }
    public function loginAdmin(Request $request){
        $request->validate([
            'mobile'=>'required|exists:admins',
            'password' => 'required|min:5|max:15'
        ]);

        $admin = Admin::where('mobile' , '=' , $request->mobile)->first();
        if($admin){
            if(Hash::check($request->password , $admin->password)){
                $request->session()->put('loginId' , $admin->id);
                return redirect("dashboard");
            }
            else{
                return back()->with('fail','this password not matches');
            }

        }
    }
    
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
