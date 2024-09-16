<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LogoutUserController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginUserController::class)->group(function(){
    Route::get('/login' , 'Login')->name('login');
    Route::post('/login/store' , 'LoginStore')->name('login.store');
});

Route::middleware('check.permission.user')->group(function(){
    Route::controller(RegisteredUserController::class)->group(function(){
        Route::get('/registere' , 'Registere')->name('registere');
        Route::post('/store' , 'Store')->name('store');
    });
});

Route::controller(LogoutUserController::class)->group(function(){
    Route::get('/logout' , 'Logout')->name('logout');
});