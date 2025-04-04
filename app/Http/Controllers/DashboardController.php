<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $data['meta_title'] = 'dashboard';
        return view('admin.dashboard',$data);
    }
}
