<?php

return [

    /*
    |--------------------------------------------------------------------------
    | General
    |--------------------------------------------------------------------------
    |
    */

    'use_apikey' => env('APP_USE_APIKEY', true),
    'accept_language' => env('APP_ACCEPT_LANGUAGE', true),
    'dd_exception' => env('APP_DD_EXCEPTION', false),

    /*
    |--------------------------------------------------------------------------
    | Database
    |--------------------------------------------------------------------------
    |
    */

    'formats' => [

        'date_time' => 'Y-m-d H:i:s',

    ],

    'redis' => [
        'prefix' => env('REDIS_PREFIX', 'base:')
    ],

];
