<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/test', function () {
    return "Hellow World";
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/authFromVK', [AuthController::class, 'authFromVK']);
Route::get('/handleVKCallback', [AuthController::class, 'handleVKCallback']);

Route::middleware('auth:sanctum')->group(function () {

    Route::middleware('role:root')->group(function () {
        Route::apiResource('/users', UserController::class);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
