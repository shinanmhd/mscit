<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\FrontEnd\HomeController::class, 'index'])->name('home.blade.php');
