<?php

namespace App\Listeners\Host;

use App\Events\Host\HostFound;

class LogFoundHost
{
    /**
     * Handle the event.
     *
     * @param  HostFound  $event
     * @return void
     */
    public function handle(HostFound $event)
    {
        $event->host->logs()->create();
    }
}
