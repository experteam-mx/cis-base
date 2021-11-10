<?php

namespace Experteam\CisBase\Events;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ModelAuditableChanged
{

    use Dispatchable, SerializesModels;

    public Model $model;

    public array $originalAttrs;

    public object|null $user;

    /**
     * Create a new event instance.
     *
     * @param Model $model
     * @param array $user
     */
    public function __construct(Model $model, object|null $user = null)
    {

        $this->model = $model;
        $this->originalAttrs = $model->getOriginal();
        $this->user = $user ?? auth()->user();

    }

}
