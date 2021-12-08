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

        // Publish config files
        $this->publishes([
            __DIR__ . '/../config/cis-base.php' => config_path('cis-base.php'),
            __DIR__ . '/../config/l5-swagger.php' => config_path('l5-swagger.php'),
            __DIR__.'/../phpcs.xml' => base_path('phpcs.xml'),
        ], 'config');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => config('l5-swagger.defaults.paths.views'),
        ], 'views');

        // Publish languages
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang'),
        ], 'languages');

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
