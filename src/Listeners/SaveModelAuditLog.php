<?php

namespace Experteam\CisBase\Listeners;

use ESLog;
use Experteam\CisBase\Events\ModelChanged;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveModelAuditLog implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param ModelChanged $event
     * @return void
     */
    public function handle(ModelChanged $event)
    {

        $modelClass = $event->model::class;

        ESLog::notice("Changes in the $modelClass model.", [
            'before' => $event->originalAttrs,
            'after' => $event->model->toArray(),
            'user' => $event->user,
        ]);

    }

}
