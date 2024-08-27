<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\FrontEnd\HomeController::class, 'index'])->name('home');

/*
 * routes to handle SSO authentication
 * */
Route::prefix('auth')->name('auth.')->group(function (){
    Route::get('{provider}', [\App\Http\Controllers\Auth\OAuthController::class, 'redirectToProvider'])->name('redirect');
    Route::get('{provider}/callback', [\App\Http\Controllers\Auth\OAuthController::class, 'handleProviderCallback'])->name('callback');
});

/*
 * routes accessible with authentication
 * */
Route::middleware('auth')->group(function (){

    Route::get('dashboard', function () { return view('dashboard'); })->name('admin');

    // user routes
    Route::prefix('user')->name('user.')->group(function (){
        Route::get('profile/edit', \App\Livewire\FrontEnd\User\Profile\EditUserProfile::class)->name('profile.edit');
    });

    // admin routes
    Route::prefix('admin')->name('admin.')->group(function (){
        Route::get('users', \App\Livewire\Admin\Users\AdminUsersIndex::class)->name('users.index');
        Route::get('closures', \App\Livewire\Admin\RoadClosuresList::class)->name('closures.index');
        Route::get('closure-types', \App\Livewire\Admin\ClosureTypes\ClosureTypesIndex::class)->name('closure-types.index');
    });
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
