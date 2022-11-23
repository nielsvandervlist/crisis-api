<?php

namespace App\Observers;

use App\Events\ReactionEvent;
use App\Models\Reaction;
use App\Models\User;

class ReactionObserver
{
    public function created(Reaction $reaction)
    {
        event(new ReactionEvent($reaction));

        $minutes = $reaction->timelinePost->updated_at->diffInMinutes($reaction->created_at);
        $scores = [1,2,3,4,5];

        foreach ($scores as $score) {
            // represents 5 minutes
            $time = $score * 5;
            if($time >= $minutes){
                $reaction->score = $score;
            } else {
                $reaction->score = 1;
            }
        }
    }
}
