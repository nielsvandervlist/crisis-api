<?php

namespace App\Observers;

use App\Events\ReactionCreated;
use App\Models\Notification;
use App\Models\Reaction;

class ReactionObserver
{
    public function created(Reaction $reaction)
    {
        event(new ReactionCreated($reaction));
    }
}
