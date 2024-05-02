<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/test', function () {
    return "Hellow World";
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/authFromVk', [AuthController::class, 'authFromVk']);
Route::get('/vkLogin', [AuthController::class, 'vkLogin']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);

    Route::middleware('role:root')->group(function () {
        Route::apiResource('/users', UserController::class);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
