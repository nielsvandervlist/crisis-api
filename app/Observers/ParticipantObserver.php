<?php

namespace App\Observers;

use App\Mail\RegisterParticipant;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ParticipantObserver
{
    // TODO check if user is created and fix participant table, auth is used with user not participant
    // This function creates a new user and sends an email to the participant
    // Check email verification https://laravel.com/docs/7.x/verification
    // Fix user roles for participants and coaches etc

    /**
     * @param Participant $participant
     */
    public function saving(Participant $participant)
    {

        $test = request()->input('email');

        if (request()->input('email')) {
            $data = [
                'name' => request()->input('name'),
                'email' => request()->input('email'),
                'password' => str_replace('/', '', Hash::make('plain-text'))
            ];

            $participant->user_id = User::firstOrCreate(['email' => request()->input('email')], $data)->id;
        }

        if (!$participant->hash) {
            $participant->hash = str_replace('/', '', Hash::make('plain-text'));
        }
    }


    public function created(Participant $participant)
    {
        Mail::queue(new RegisterParticipant($participant));
    }
}
