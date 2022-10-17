<?php

namespace App\Listeners;

use App\Events\ReactionCreated;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUserAboutReaction
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
     * @param ReactionCreated $event
     */
    public function handle(ReactionCreated $event)
    {
        $notification = Notification::create([
            'title' => 'New reaction from' . $event->reaction->participant->name,
            'src' => env('FRONTEND_URL') . '/reactions/' . $event->reaction->id,
            'status' => false,
            'participant_id' => $event->reaction->participant_id,
            'reaction_id' => $event->reaction->id,
        ]);

        $notification->save();
    }
}
