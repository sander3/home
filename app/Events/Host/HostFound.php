<?php

namespace App\Events\Host;

use App\Host;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class HostFound
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Host
     */
    public $host;

    /**
     * Create a new event instance.
     *
     * @param  \App\Host  $host
     * @return void
     */
    public function __construct(Host $host)
    {
        $this->host = $host;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
