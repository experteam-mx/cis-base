<?php

namespace Experteam\CisBase\Models;

use Experteam\CisBase\Events\ModelAuditableChanged;

trait BaseModelAuditable
{

    protected static function booted()
    {

        static::saved(function ($model) {

            ModelAuditableChanged::dispatch($model);
        });
    }
}
