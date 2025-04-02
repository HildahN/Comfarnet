<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('login', [AuthController::class, 'Login']);


Route::middleware('auth:api')->group(function () {
    Route::apiResources([
        'districts' => DistrictController::class
    ]);
});
