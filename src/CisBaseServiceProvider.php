<?php

namespace Experteam\CisBase;

use Experteam\CisBase\Facades\ESLog;
use Experteam\CisBase\Facades\RedisClient;
use Illuminate\Support\ServiceProvider;

class CisBaseServiceProvider extends ServiceProvider
{

    public function register()
    {

        // Redis facade
        app()->bind(RedisClient::class, fn() => new RedisClient());

        // Redis facade
        app()->bind(ESLog::class, fn() => new ESLog());

        // Event service provider
        app()->register(EventServiceProvider::class);

    }

    public function boot()
    {

        // Publish a config file
        $this->publishes([
            __DIR__ . '/../config/cis-base.php' => config_path('cis-base.php'),
        ], 'config');

        // Custom validation rules
        \Validator::extend('key_ids', function ($attribute, $values, $parameters) {

            $attribute = explode('.', $attribute);

            return is_numeric($attribute[1]) &&
                \DB::table($parameters[0])
                    ->where(
                        $parameters[1],
                        $attribute[1]
                    )->exists();

        });
        \Validator::extend('in_redis', function ($attribute, $values, $parameters) {

            $isHash = filter_var($parameters[1] ?? true, FILTER_VALIDATE_BOOLEAN);

            return $isHash ?
                \RedisClient::hexists($parameters[0], $values) :
                \RedisClient::exists($parameters[0]);

        });

    }

}
