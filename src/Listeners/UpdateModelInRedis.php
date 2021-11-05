<?php

namespace Experteam\CisBase\Listeners;

use Experteam\CisBase\Events\ModelInRedisChanged;
use RedisClient;
use Str;

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

        $class = Str::plural($class);
        $class = Str::snake($class);

        if (!empty($model->deleted_at))
            RedisClient::hdel($class, $model->id, $model);
        else
            RedisClient::hset($class, $model->id, $model);

    }

}
