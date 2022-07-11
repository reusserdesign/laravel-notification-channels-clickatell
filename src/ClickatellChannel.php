<?php

namespace NotificationChannels\Clickatell;

use Illuminate\Notifications\Notification;
use NotificationChannels\Clickatell\Exceptions\CouldNotSendNotification;

class ClickatellChannel
{
    /** @var ClickatellClient */
    protected $clickatell;

    /**
     * @param  ClickatellClient  $clickatell
     */
    public function __construct(ClickatellClient $clickatell)
    {
        $this->clickatell = $clickatell;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  Notification  $notification
     *
     * @throws CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toClickatell($notifiable);

        $this->clickatell->send($message);
    }
}
