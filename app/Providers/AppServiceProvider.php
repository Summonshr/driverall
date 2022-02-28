<?php

namespace App\Providers;

use App\Interfaces\ResourceModel;
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
        $this->app->bind(ResourceModel::class, function ($app) {
            return $app->make(config('resource.types')[request('type')]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
