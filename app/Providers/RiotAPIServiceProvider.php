<?php

namespace App\Providers;

use App\Service\Riot\RiotService;
use App\Service\Riot\RiotServiceInterface;
use Illuminate\Support\ServiceProvider;

class RiotAPIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RiotServiceInterface::class,
            RiotService::class
        );
    }
}
