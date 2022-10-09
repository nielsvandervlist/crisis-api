<?php

namespace Tests\Feature;

use App\Models\Timeline;
use App\Models\TimelinePost;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TimelinePostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itCanIndex()
    {
        $timeline_posts = TimelinePost::factory()->count(3)->create();
        $user = User::factory()->create();

        $this->actingAs($user)->getJson(route('timeline_posts.index'))
            ->assertStatus(200)
            ->assertJsonCount($timeline_posts->count(), 'data')
            ->assertJson([
                'data' => $timeline_posts->map->only('id')->toArray()
            ]);
    }

    /**
     * @test
     */
    public function itCanStore()
    {
        $timeline = Timeline::factory()->create([
            'start_time' => Carbon::now()->format('Y-m-d h:i:s'),
            'end_time' => Carbon::now()->addHour(2)->format('Y-m-d h:i:s')
        ]);

        $timeline_post = TimelinePost::factory()->make([
            'timeline_id' => $timeline->id,
            'time' => Carbon::now()->addHour(1)->format('Y-m-d h:i:s')
        ]);

        $user = User::factory()->create();

        $this->actingAs($user)->postJson(route('timeline_posts.store'), $timeline_post->toArray())
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'id' => 1
                ],
            ]);

        $this->assertDatabaseHas('timeline_posts', [
            'id' => 1
        ]);
    }
}
