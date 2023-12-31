<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WebHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;




Route::get('/',[WebHomeController::class,'index'])->name('web.home');
Route::get('/menu',[WebHomeController::class,'menu'])->name('home.menu');
Route::get('/combo',[WebHomeController::class,'combo'])->name('home.combo');
Route::get('/event',[WebHomeController::class,'event'])->name('home.event');

Route::get('/add-to-cart/{id}', [WebHomeController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart-view', [WebHomeController::class, 'cartView'])->name('cart.view');
Route::get('/cart-item-remove/{id}', [WebHomeController::class, 'cartItemRemove'])->name('cart.item.remove');
Route::get('/cart-clear', [WebHomeController::class, 'clearCart'])->name('cart.clear');


// Route::get('/add-to-cart/{id}', [WebHomeController::class, 'addToCartCombo'])->name('add.to.cart.combo');

// Route::resource('web',WebController::class);
Route::get('/checkout', [WebHomeController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [WebHomeController::class, 'placeOrder'])->name('place.order');

Route::group(['prefix'=> 'admin'], function () {
    


    Route::get('/',[HomeController::class,'home'])->name('home');
    
    Route::get('loginForm',[AuthController::class,'loginForm'])->name('login.form');
    Route::post('login',[AuthController::class,'login'])->name('login');
    
    Route::group(['middleware'=> ['auth']], function () {
        
        Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
        Route::get('logout',[AuthController::class,'logout'])->name('logout');

        Route::resource('category',CategoryController::class);
        Route::resource('menu',MenuController::class);
        Route::resource('combo',ComboController::class);
        Route::resource('event',EventController::class);
        Route::resource('member',MemberController::class);
        Route::resource('team',TeamController::class);
        
        Route::resource('order',OrderController::class);
        Route::resource('orderItem',OrderItemController::class);
        Route::resource('report',ReportController::class);
    });

});






