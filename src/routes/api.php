<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('active-closures', \App\Http\Controllers\FrontEnd\Api\ActiveClosures::class)->name('api.active-closures');
