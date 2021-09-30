<?php

namespace Experteam\CisBase;

use Experteam\CisBase\Facades\RedisClient;
use Illuminate\Support\ServiceProvider;

class CisBaseServiceProvider extends ServiceProvider
{

    public function register()
    {

        // Redis facade
        app()->bind(RedisClient::class, fn() => new RedisClient());

        // Event service provider
        app()->register(EventServiceProvider::class);

    }

    public function boot()
    {

        // Publish a config file
        $this->publishes([
            __DIR__ . '/../config/cis-base.php' => config_path('cis-base.php'),
        ], 'config');

    }

}