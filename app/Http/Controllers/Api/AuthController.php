<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $data['token'] = $user->createToken('API Token')->accessToken;
        $data['user'] = $user;
        $user->getAllPermissions();



        return response()->json($data, 200);
    }


    //get authenticated user
    public function User()
    {
        $getusers = User::all();
        return response()->json($getusers, 200);
    }


}
