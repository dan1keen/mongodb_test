<?php

namespace App\Providers;

use App\Services\Api\v1\GasStationService;
use App\Services\Api\v1\Impl\GasStationServiceImpl;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GasStationService::class, function($app) {
            return new GasStationServiceImpl();
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
