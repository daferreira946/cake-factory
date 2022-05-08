<?php

namespace App\Notifications;

use App\Models\InterestedEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AvailableCakeNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private InterestedEmail $interestedEmail;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(InterestedEmail $interestedEmail)
    {
        $this->interestedEmail = $interestedEmail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line("The cake {$this->interestedEmail->cake->name} is available, run because we have only {$this->interestedEmail->cake->available_quantity}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            'message' => "The cake {$this->interestedEmail->cake->name} is available, run because we have only {$this->interestedEmail->cake->available_quantity}"
        ];
    }
}
