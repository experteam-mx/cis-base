<?php


namespace Experteam\CisBase\Facades;


use Illuminate\Support\Facades\Facade;

class RedisClientFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {

        return RedisClient::class;

    }

}
