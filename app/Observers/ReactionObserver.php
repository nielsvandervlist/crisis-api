<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Reaction;

class ReactionObserver
{
    //TODO create job for checking up on notifications and add user_id
    public function created(Reaction $reaction)
    {
        $notification = Notification::create([
            'status' => false,
            'participant_id' => $reaction->participant_id,
            'reaction_id' => $reaction->id,
        ]);

        return $notification->save();
    }
}
