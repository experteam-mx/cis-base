<?php


namespace Experteam\CisBase\Models;


use Experteam\CisBase\Events\ModelChanged;

trait BaseModelChanged
{

    protected static function booted()
    {

        static::saved(function ($model) {

            ModelChanged::dispatch($model);

        });

    }

}
