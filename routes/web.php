<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmersController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('migrate', function(){
    Artisan::call('migrate', ['--force' =>true]);
    return Artisan:: output();
});


// Auth Routes
Route::get('/',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'login_post']);
Route::get('logout',[AuthController::class,'logout']);




//ADMIN MIDDLEWARE
Route::group(['middleware' => 'admin'], function(){
        Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
        //Farmers
        Route::get('farmers/list',[FarmersController::class,'index']);
        Route::get('farmers/add',[FarmersController::class,'create']);
        Route::post('farmers/add',[FarmersController::class,'store']);
        Route::get('farmers/edit/{id}',[FarmersController::class,'edit']);
        Route::post('farmers/edit/{id}',[FarmersController::class,'update']);
        Route::get('farmers/delete/{id}',[FarmersController::class,'destroy']);

});


//FARMER MIDDLEWARE
Route::group(['middleware' => 'farmer'], function (){
    Route::get('farmer/dashboard',[DashboardController::class,'dashboard']);
});
