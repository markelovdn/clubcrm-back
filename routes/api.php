<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/getUserByToken', function () {
    return json_encode(['message' => 'Hello World!']);
});

Route::get('/test1', function () {
    return json_encode(['message' => 'test!']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
