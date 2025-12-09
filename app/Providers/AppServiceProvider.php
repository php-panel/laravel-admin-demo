<?php

namespace App\Providers;

use Ladmin\Auth\Database\Administrator;
use Ladmin\Auth\Database\Menu;
use Ladmin\Auth\Database\Permission;
use Ladmin\Auth\Database\Role;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $callback = function () {
            return false;
        };

        //        Menu::saving($callback);
        //        Role::saving($callback);
        //        Permission::saving($callback);
        //        Administrator::saving($callback);
        //
        //        Menu::deleting($callback);
        //        Role::deleting($callback);
        //        Permission::deleting($callback);
        //        Administrator::deleting($callback);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
