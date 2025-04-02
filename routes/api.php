<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FarmerProfileController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\RolePermissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('login', [AuthController::class, 'Login']);


Route::get("roles/{guard?}", [RoleController::class, 'index'])->name('urole.index');
Route::apiResource('roles', RoleController::class)->shallow()->except('index');
    
Route::apiResource('role.permission', RolePermissionController::class)->only(['index', 'store']);
Route::post('role.permission/{roleId}', [RolePermissionController::class, 'store']);



Route::middleware('auth:api')->group(function () {
    Route::apiResources([
        'districts' => DistrictController::class
    ]);

    Route::apiResources([
        'farmer_profiling' => FarmerProfileController::class
    ]);

    Route::apiResources([
        'permissions' => PermissionController::class
    ]);
});
