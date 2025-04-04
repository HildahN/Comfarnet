<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('migrate', function(){
    Artisan::call('migrate', ['--force' =>true]);
    return Artisan:: output();
});


// Frontend Routes

Route::get('/',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'login_post']);
Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
Route::get('logout',[AuthController::class,'logout']);