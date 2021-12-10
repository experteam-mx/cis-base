<?php

namespace Experteam\CisBase\Events;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ModelInRedisChanged
{
    use Dispatchable;
    use SerializesModels;

    public Model $model;
    public string|null $key;

    /**
     * Create a new event instance.
     *
     * @param Model $model
     * @param null $key
     */
    public function __construct(Model $model, $key = null)
    {
        $this->model = $model;

        if (!empty($key)) {
            $this->key = $key;
        } elseif (!empty($model->code)) {
            $this->key = $model->code;
        }
    }
}
