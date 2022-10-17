<?php

namespace App\Events;

use App\Models\Reaction;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReactionCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Reaction $reaction;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Reaction $reaction)
    {
        $this->reaction = $reaction;
    }
}
