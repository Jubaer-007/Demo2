<?php

namespace App\Providers;

use App\Models\Combo;
use App\Models\Event;
use App\Models\Menu;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       view::share('menus', Menu::all());
       view::share('combos', Combo::all());
       view::share('events', Event::all());
    }
}
