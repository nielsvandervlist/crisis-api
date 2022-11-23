<?php

namespace App\Events;

use App\Models\Participant;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ReactionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reaction, $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Reaction $reaction)
    {
        $this->user = User::find($reaction->user_id);
        $this->reaction = $reaction;
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return 'user.reaction';
    }

    /**
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'user' => $this->user,
            'title' => $this->reaction->title,
            'src' => $this->reaction->src,
            'participant' => $this->reaction->participant(),
            'createdAt' => now()->toDateTimeString(),
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // TODO is een private channel, moet naar de owner van particpant gaan, owner_id toevoegen aan participant
        return new PrivateChannel('App.Models.User.' . $this->user->id);
    }
}
