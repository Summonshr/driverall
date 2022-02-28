<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('user', 'UserController@index');  
        Route::resource('resource','ResourceController');
        Route::get('resource/{resource}/tags','TagsController@index');
    });

    Route::middleware('guest')->group(function(){
        Route::post('login','AuthController@login');
        Route::post('sign-up','UserController@create');
        Route::post('login-using-otp', 'AuthController@loginUsingOTP');
        Route::get('/email/verify/{id}/{hash}', 'UserController@verify')->middleware([ 'signed'])->name('verification.verify');
    });

});