<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSmsActiveCode extends Notification
{
    use Queueable;

    public $code;
    public $mobile;

    /**
     * Create a new notification instance.
     */
    public function __construct($code , $mobile)
    {
        $this->code = $code;
        $this->mobile = $mobile;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toFarazSms($notifiable)
    {
        return [
            'active_code' => $this->code,
            'mobile' => $this->mobile
        ];
    }
}
