<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;


Route::group(['prefix'=> 'admin'], function () {

    Route::get('/',[HomeController::class,'home'])->name('home');
    
    Route::get('loginForm',[AuthController::class,'loginForm'])->name('login.form');
    Route::post('login',[AuthController::class,'login'])->name('login');
    
    Route::group(['middleware'=> ['auth']], function () {
        
        Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
        Route::get('logout',[AuthController::class,'logout'])->name('logout');

        Route::resource('menu',MenuController::class);
      
    });

});






