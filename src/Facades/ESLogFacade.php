<?php

namespace Experteam\CisBase\Facades;

use Illuminate\Support\Facades\Facade;

class ESLogFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {

        return ESLog::class;
    }
}
