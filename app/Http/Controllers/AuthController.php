<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $data['meta_title'] = 'login';
        return view('auth.login',$data);
    }

    public function login_post(Request $request){
        if(Auth::attempt(['email'=> $request->email,'password'=> $request->password])){
            if(Auth::user()->is_role==1){
               return redirect()->intended('admin/dashboard');
            }else if(Auth::user()->is_role == 2){
               //echo "Please be patient the Farmers Dashboard will come soon!!!";
               return redirect()->intended('farmer/dashboard');
            }
        }else{
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
