<?php

namespace Experteam\CisBase;

use Illuminate\Support\ServiceProvider;

class CisBaseServiceProvider extends ServiceProvider
{

    public function boot()
    {

        // Publish a config file
        $configPath = __DIR__ . '/../config/cis-base.php';
        $this->publishes([
            $configPath => config_path('cis-base.php'),
        ], 'config');

    }

}