<?php

namespace App\Providers;

use Illuminate\Support\Facades\View; // Make sure this import statement is present
use Illuminate\Support\ServiceProvider;
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
        View::composer('partials._sidebar-links', function ($view) {
            $user = auth()->user();

            $friends = $user->allFriends();

            $view->with(compact('friends'));
        });
    }
}
