<?php

namespace Tests\Feature;

use App\Models\Reaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itCanMakeNotification()
    {
        $reaction = Reaction::factory()->create();
        $this->assertDatabaseHas('notifications', [
            'id' => 1
        ]);
    }

    /**
     * @test
     */
    public function itSavesNotificationOnReactionCreated()
    {
        $reaction = Reaction::factory()->create();
        $this->assertDatabaseHas('notifications', [
            'reaction_id' => $reaction->id,
        ]);
    }
}
