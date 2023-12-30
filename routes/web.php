<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WebHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;




Route::get('/',[WebHomeController::class,'index'])->name('web.home');
Route::resource('web',WebController::class);

Route::group(['prefix'=> 'admin'], function () {

    Route::get('/',[HomeController::class,'home'])->name('home');
    
    Route::get('loginForm',[AuthController::class,'loginForm'])->name('login.form');
    Route::post('login',[AuthController::class,'login'])->name('login');
    
    Route::group(['middleware'=> ['auth']], function () 
    {
        
        Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
        Route::get('logout',[AuthController::class,'logout'])->name('logout');

        Route::resource('menu',MenuController::class);
        Route::resource('menuItem',MenuItemController::class);
        Route::resource('order',OrderController::class);
        Route::resource('orderItem',OrderItemController::class);
        Route::resource('report',ReportController::class);
    });

});






