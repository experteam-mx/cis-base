<?php

namespace Experteam\CisBase\Models;

use Experteam\CisBase\Events\ModelInRedisChanged;

trait BaseModelInRedis
{

    protected static function booted()
    {

        static::saved(function ($model) {

            ModelInRedisChanged::dispatch($model);
        });
    }
}
