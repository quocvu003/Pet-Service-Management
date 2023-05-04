<?php

namespace App\Providers;

use App\Http\View\Composers\NhanVienComposer;
use App\Http\View\Composers\SideBarComposer;
use App\Http\View\Composers\ShopComposer;
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
        View::composer('admin/sidebar', SideBarComposer::class);
        View::composer('ChuShop/sidebar', ShopComposer::class);
        View::composer('ChuShop/nav', ShopComposer::class);
        View::composer('NhanVien/sidebar', NhanVienComposer::class);
        View::composer('NhanVien/nav', NhanVienComposer::class);
    }
}
