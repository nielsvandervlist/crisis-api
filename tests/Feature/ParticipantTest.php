<?php

namespace Tests\Feature;

use App\Mail\RegisterParticipant;
use App\Models\Participant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParticipantTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itCanSetHtmlForEmail()
    {
        $participant = Participant::factory()->create();
        $mailable = new RegisterParticipant($participant);

        $mailable->assertSeeInHtml($participant->url);
    }
}
