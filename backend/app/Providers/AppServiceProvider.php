<?php

namespace TelzirApp\Providers;

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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \TelzirApp\Repositories\PlanosRepository::class,
            \TelzirApp\Repositories\PlanosRepositoryEloquent::class
        );
    }
}
