<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::get('/test', function () {
    return json_encode(['message' => 'Hello World!']);
});

Route::get('/authFromVK', [AuthController::class, 'authFromVK']);
Route::get('/handleVKCallback', function (Request $request) {
    return $request->all();
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
