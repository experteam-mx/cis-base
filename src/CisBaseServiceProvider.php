<?php

namespace Experteam\CisBase;

use Illuminate\Support\ServiceProvider;

class CisBaseServiceProvider extends ServiceProvider
{

    public function boot()
    {

        // Publish a config file
        $this->publishes([
            __DIR__ . '/../config/cis-base.php' => config_path('cis-base.php'),
        ], 'config');

    }

}