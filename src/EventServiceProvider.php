<?php

namespace Experteam\CisBase;

use Experteam\CisBase\Events\ModelInRedisChanged;
use Experteam\CisBase\Listeners\UpdateModelInRedis;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        ModelInRedisChanged::class => [
            UpdateModelInRedis::class,
        ],
    ];

}