<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
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
        //
        view()->composer('layout', function ($view) {

            $id_user_login = Auth::user()->id;

            if ($id_user_login == 1) {
                $users = User::where('id', '>', 1)->get();
            } else {
                $users = User::find(1);
            }

            $view->with('users', $users);
        });
        Paginator::useBootstrapFive();
    }
}
