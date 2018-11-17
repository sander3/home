<?php

namespace App\Notifications;

use App\Host;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Pushover\PushoverChannel;
use NotificationChannels\Pushover\PushoverMessage;

class NewHostFound extends Notification
{
    use Queueable;

    /**
     * @var \App\Host
     */
    public $host;

    /**
     * Create a new notification instance.
     *
     * @param  \App\Host  $host
     * @return void
     */
    public function __construct(Host $host)
    {
        $this->host = $host;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [PushoverChannel::class];
    }

    /**
     * Get the Pushover representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \NotificationChannels\Pushover\PushoverMessage
     */
    public function toPushover($notifiable)
    {
        return PushoverMessage::create()
            ->title(__('New host found'))
            ->content($this->host->toString())
            ->highPriority();
    }
}
