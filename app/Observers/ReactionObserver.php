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
    }
}
