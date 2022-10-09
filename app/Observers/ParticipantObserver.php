<?php

namespace App\Observers;

use App\Mail\RegisterParticipant;
use App\Models\Participant;
use Illuminate\Support\Facades\Mail;

class ParticipantObserver
{
    public function created(Participant $participant)
    {
        Mail::queue(new RegisterParticipant($participant));
    }
}
