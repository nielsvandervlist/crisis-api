<?php

namespace App\Mail;

use App\Clients\Spaces;
use App\Models\BroadcastUser;
use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterParticipant extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Participant $participant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this
            ->view('emails.registration.complete', [
                'link' => config('app.url') . '/participants/' . $this->participant->hash . '/edit',
                'company' => $this->participant->company->name,
                'name' => $this->participant->name,
            ])
            ->from('admin@example.com', 'Example')
            ->to($this->participant->email, 'Ontvanger')
            ->subject('Inschrijvingsbevestiging ' . $this->participant->name);
    }
}
