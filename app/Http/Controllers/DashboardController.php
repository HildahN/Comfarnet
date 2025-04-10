<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        if(Auth::user()->is_role==1){

            $data['meta_title'] = 'admin-dashboard';
            return view('admin.dashboard',$data);

        }elseif(Auth::user()->is_role==2){
            $data['meta_title'] = 'farmer-dashbaord';
            return view('farmer.dashboard',$data);
        }
        
    }
}
