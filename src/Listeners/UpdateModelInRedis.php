<?php

namespace Experteam\CisBase\Listeners;

use Experteam\CisBase\Events\ModelInRedisChanged;
use RedisClient;
use ICanBoogie\Inflector;

class UpdateModelInRedis
{

    /**
     * Handle the event.
     *
     * @param ModelInRedisChanged $event
     * @return void
     */
    public function handle(ModelInRedisChanged $event)
    {

        $model = $event->model;

        $class = class_basename($model);

        $inflector = Inflector::get('en');

        $class = $inflector->pluralize($class);
        $class = $inflector->underscore($class);

        RedisClient::hset($class, $model->id, $model);

    }

}
