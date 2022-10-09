<?php

namespace App\Observers;

use App\Mail\RegisterParticipant;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tychovbh\LaravelCrud\Tests\Database\Factories\RoleFactory;

class ParticipantObserver
{
    // TODO check if user is created and fix participant table, auth is used with user not participant
    // This function creates a new user and sends an email to the participant
    // Check email verification https://laravel.com/docs/7.x/verification

    /**
     * @param Participant $participant
     */
    public function saving(Participant $participant)
    {
        if (request()->input('email')) {
            $data = [
                'name' => request()->input('name'),
                'email' => request()->input('email'),
                'role_id' => 1,
            ];

            $participant->user_id = User::firstOrCreate(['email' => request()->input('email')], $data)->id;
        }

        if (!$participant->hash) {
            $participant->hash = Str::uuid();
        }
    }


    public function created(Participant $participant)
    {
        Mail::queue(new RegisterParticipant($participant));
    }
}
