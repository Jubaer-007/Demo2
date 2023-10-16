<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GirlsController;
use App\Http\Controllers\MenuController;

Route::get('/',[HomeController::class, 'home']);
Route::get('/Girls',[GirlsController::class,'girls']);
Route::get('/Menu',[MenuController::class,'menu']);


