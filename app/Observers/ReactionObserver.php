<?php

namespace App\Observers;

use App\Models\Reaction;
use App\Models\User;
use App\Notifications\ReactionCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ReactionObserver
{
    public function created(Reaction $reaction)
    {
        $user = $reaction->participant->user;
        $user->notify(new ReactionCreated($reaction));
    }
}
