<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/menu',[MenuController::class,'menu'])->name('menu');

Route::get('/category',[CategoryController::class,'category'])->name('category');
