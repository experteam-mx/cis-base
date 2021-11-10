<?php

namespace Experteam\CisBase\Listeners;

use ESLog;
use Experteam\CisBase\Events\ModelAuditableChanged;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveModelAuditLog implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param ModelAuditableChanged $event
     * @return void
     */
    public function handle(ModelAuditableChanged $event)
    {

        $modelClass = $event->model::class;

        ESLog::notice("Changes in the $modelClass model.", [
            'before' => $event->originalAttrs,
            'after' => $event->model->toArray(),
            'user' => $event->user,
        ]);

    }

}
