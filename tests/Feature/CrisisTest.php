<?php

namespace Tests\Feature;

use App\Models\Crisis;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CrisisTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itCanIndex()
    {
        $user = User::factory()->create();
        $crises = Crisis::factory()->count(3)->create();

        $this->actingAs($user)->getJson(route('crises.index'))
            ->assertStatus(200)
            ->assertJsonCount($crises->count(), 'data')
            ->assertJson([
                'data' => $crises->map->only('id')->toArray()
            ]);
    }


    /**
     * It can update
     *
     * @test
     */
    public function itCanUpdate()
    {
        $crisis = Crisis::factory()->create();
        $update = Crisis::factory()->make([
            'status' => true,
        ]);

        $timeline = Timeline::factory()->create([
            'crisis_id' => $crisis->id,
        ]);

        $user = User::factory()->create();

        $this->actingAs($user)->putJson(route('crises.update', ['id' => $crisis->id]), $update->toArray())
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $crisis->id,
                ],
            ]);

        $this->assertDatabaseHas('crises', [
            'id' => $crisis->id,
        ]);
    }
}
