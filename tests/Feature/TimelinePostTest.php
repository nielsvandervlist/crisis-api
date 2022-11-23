<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Crisis;
use App\Models\Post;
use App\Models\Timeline;
use App\Models\TimelinePost;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
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
    public function itCanIndexActive()
    {
        $timeline_posts = TimelinePost::factory()->count(3)->create();

        $crisis = Crisis::factory()->create([
            'status' => true,
        ]);
        $company = Company::factory()->create();
        $timeline = Timeline::factory()->create([
            'company_id' => $company->id,
            'duration' => 60,
            'crisis_id' => $crisis->id,
        ]);

        $post = Post::factory()->create();

        $active = TimelinePost::factory()->create([
            'time' => 12,
            'timeline_id' => $timeline->id,
            'post_id' => $post->id,
        ]);

        $user = User::factory()->create();

        $this->actingAs($user)->getJson(route('timeline_posts.index', [
            'active' => [
                'company_id' => $company->id,
                'crisis_id' => $timeline->crisis_id,
                'status' => $crisis->status
            ],
        ]))
//            ->assertStatus(200)
            ->assertJson([
                'data' => $active
            ]);
    }

    /**
     * It can update
     *
     * @test
     */
    public function itCanUpdate()
    {
        $timeline_post = TimelinePost::factory()->create([
            'online' => false,
        ]);
        $update = TimelinePost::factory()->make([
            'online' => true,
        ]);

        $this->putJson(route('timeline_post.update', ['id' => $timeline_post->id]), $update->toArray())
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $timeline_post->id,
                ],
            ]);

        $this->assertDatabaseHas('posts', [
            'id' => $timeline_post->id,
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
