<?php

namespace Tests\Feature;

use App\Models\Participant;
use App\Models\Reaction;
use App\Models\User;
use App\Notifications\ReactionCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ReactionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itCanIndex()
    {
        $user = User::factory()->create();
        $reactions = Reaction::factory()->count(3)->create();

        $this->actingAs($user)->getJson(route('reactions.index'))
            ->assertStatus(200)
            ->assertJsonCount($reactions->count(), 'data')
            ->assertJson([
                'data' => $reactions->map->only('id')->toArray()
            ]);
    }

    /**
     * @test
     */
    public function itCanIndexAllReactionsFromParticipants()
    {
        $user = User::factory()->create();
        $participant = Participant::factory()->create([
            'user_id' => $user->id
        ]);
        $reactions = Reaction::factory()->count(3)->create([
            'participant_id' => $participant->id,
        ]);

        Reaction::factory()->create();

        $this->actingAs($user)->getJson(route('reactions.index', ['user_id' => $user->id]))
            ->assertStatus(200)
            ->assertJsonCount($reactions->count(), 'data')
            ->assertJson([
                'data' => $reactions->map->only('id')->toArray()
            ]);
    }

    /**
     * @test
     */
    public function itCanSendNotifications()
    {
        $user = User::factory()->create();
        $participant = Participant::factory()->create([
            'user_id' => $user->id
        ]);
        $reaction = Reaction::factory()->create([
            'participant_id' => $participant->id,
        ]);

        $user->notify(new ReactionCreated($reaction));

        Notification::assertSentTo($user, ReactionCreated::class);

    }

}
