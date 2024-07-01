<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController\CountryController;
use App\Http\Controllers\LocationController\DistrictController;
use App\Http\Controllers\LocationController\RegionController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\UserController;

Route::post('/telegram/webhook', [TelegramController::class, 'handle']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/forgotPassword', [AuthController::class, 'sendToken']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::apiResource('/countries', CountryController::class)->only(['index', 'show']);
Route::apiResource('/districts', DistrictController::class)->only(['index', 'show']);
Route::apiResource('/regions', RegionController::class)->only(['index', 'show']);

Route::get('/authFromVk', [AuthController::class, 'authFromVk']);
Route::get('/vkLogin', [AuthController::class, 'vkLogin']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/setProfile', [UserController::class, 'setProfile']);
    Route::apiResource('/roles', RoleController::class);
    Route::get('/get-all-organizations-title', [OrganizationController::class, 'getAllTitle']);

    Route::middleware('any-role')->group(function () {
        Route::apiResource('/users', UserController::class)->only(['update']);
    });

    Route::middleware('role:root')->group(function () {
        Route::apiResource('/users', UserController::class)->only(['index', 'destroy']);
    });

    Route::middleware('role:admin,root,manager')->group(function () {
        Route::apiResource('/organizations', OrganizationController::class);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
