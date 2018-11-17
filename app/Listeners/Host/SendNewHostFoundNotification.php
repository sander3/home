<?php

namespace App\Listeners\Host;

use App\User;
use App\Events\Host\HostFound;
use App\Notifications\NewHostFound;
use Illuminate\Support\Facades\Notification;

class SendNewHostFoundNotification
{
    /**
     * Handle the event.
     *
     * @param  HostFound  $event
     * @return void
     */
    public function handle(HostFound $event)
    {
        if ($event->host->wasRecentlyCreated) {
            $users = User::all();
            Notification::send($users, new NewHostFound($event->host));
        }
    }
}
