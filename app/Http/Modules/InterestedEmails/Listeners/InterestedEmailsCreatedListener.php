<?php

namespace App\Http\Modules\InterestedEmails\Listeners;

use App\Http\Modules\InterestedEmails\Events\InterestedEmailsCreatedEvent;
use App\Notifications\AvailableCakeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InterestedEmailsCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param InterestedEmailsCreatedEvent $event
     * @return void
     */
    public function handle(InterestedEmailsCreatedEvent $event)
    {
        $cake = $event->interestedEmail->cake;

        if ($cake->available_quantity > 0) {
            $event->interestedEmail->notify(new AvailableCakeNotification($event->interestedEmail));
        }
    }
}
