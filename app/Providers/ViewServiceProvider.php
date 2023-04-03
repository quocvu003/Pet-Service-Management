<?php

namespace App\Providers;

use App\Http\View\Composers\CartComposer;
use App\Http\View\Composers\MenuComposer;
use App\Http\View\Composers\SideBarComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('user/header', MenuComposer::class);
        View::composer('user/cart', CartComposer::class);
        View::composer('admin/sidebar', SideBarComposer::class);
        View::composer('ChuShop/sidebar', SideBarComposer::class);
    }
}
