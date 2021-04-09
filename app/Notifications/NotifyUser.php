<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyUser extends Notification
{
    use Queueable;

    private $notify_type;
    private $content;

    /**
     * NotifyUser constructor.
     * @param $notify_type
     * @param $content
     */
    public function __construct($notify_type, $content)
    {
        $this->notify_type = $notify_type;
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [



            'notify_type' => $this->notify_type,
            'content' => $this->content



        ];
    }
}
