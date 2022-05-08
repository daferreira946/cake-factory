<?php

namespace App\Http\Modules\InterestedEmails\Events;

use App\Models\InterestedEmail;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InterestedEmailsCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public InterestedEmail $interestedEmail;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(InterestedEmail $interestedEmail)
    {
        $this->interestedEmail = $interestedEmail;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn(): Channel|PrivateChannel|array
    {
        return new PrivateChannel('channel-name');
    }
}
