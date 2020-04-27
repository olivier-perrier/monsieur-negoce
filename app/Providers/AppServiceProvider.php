<?php

namespace App\Providers;

use App\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // app()->bind('App\Project', function (Project $project) {
        //     return $project;
        // });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Gate::define('admin', function ($user) {
            return $user->isAdministrator();
        });

        Gate::define('client', function ($user) {
            return $user->isClient();
        });

        Gate::define('negotiator', function ($user) {
            return $user->isNegotiator();
        });
    }
}
