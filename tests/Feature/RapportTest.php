<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Crisis;
use App\Models\Post;
use App\Models\Rapport;
use App\Models\Reaction;
use App\Models\Timeline;
use App\Models\TimelinePost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RapportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itCanIndexReactionsFromRapport()
    {
        $user = User::factory()->create();
        $crisis = Crisis::factory()->create();
        $rapport = Rapport::factory()->create([
            'crisis_id' => $crisis->id,
        ]);

        $reactions = Reaction::factory()->count(3)->create([
            'crisis_id' => $crisis->id,
        ]);

        $this->actingAs($user)->getJson(route('rapports.index', ['reactions' => $crisis->id]))
            ->assertStatus(200)
//            ->assertJsonCount($reactions->count(), 'data')
            ->assertJson([
                'data' => $reactions->map->only('id')->toArray()
            ]);
    }
}
