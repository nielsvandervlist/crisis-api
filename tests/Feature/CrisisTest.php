<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Crisis;
use App\Models\Post;
use App\Models\Timeline;
use App\Models\TimelinePost;
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
        $company = Company::factory()->create();
        $crisis = Crisis::factory()->create([
            'status' => false,
            'company_id' => $company->id,
        ]);
        $update = Crisis::factory()->make([
            'status' => true,
        ]);

        $timeline_posts = TimelinePost::factory()->count(3)->create();

        $timeline = Timeline::factory()->create([
            'company_id' => $company->id,
            'duration' => 60,
            'crisis_id' => $crisis->id,
        ]);

        $post = Post::factory()->create();

        TimelinePost::factory()->create([
            'time' => 12,
            'timeline_id' => $timeline->id,
            'post_id' => $post->id,
        ]);

        $user = User::factory()->create();

        $this->actingAs($user)->putJson(route('crises.update', ['id' => $crisis->id]), $update->toArray())
//            ->assertStatus(200)
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
