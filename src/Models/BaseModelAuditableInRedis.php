<?php

namespace Experteam\CisBase\Models;

use Experteam\CisBase\Events\ModelAuditableChanged;
use Experteam\CisBase\Events\ModelInRedisChanged;

trait BaseModelAuditableInRedis
{

    protected static function booted()
    {

        static::saved(function ($model) {

            ModelInRedisChanged::dispatch($model);
            ModelAuditableChanged::dispatch($model);
        });
    }
}
