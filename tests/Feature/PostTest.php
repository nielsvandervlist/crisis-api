<?php

namespace Tests\Feature;

use App\Models\AppRole;
use App\Models\Company;
use App\Models\Post;
use App\Models\Timeline;
use App\Models\TimelinePost;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itCanIndex()
    {
        $posts = Post::factory()->count(3)->create();

        $this->getJson(route('posts.index'))
            ->assertStatus(200)
            ->assertJsonCount($posts->count(), 'data')
            ->assertJson([
                'data' => $posts->map->only('id')->toArray()
            ]);
    }

    /**
     * @test
     */
    public function itCanIndexActive()
    {
        $timeline_posts = TimelinePost::factory()->count(3)->create();

        $company = Company::factory()->create();
        $timeline = Timeline::factory()->create([
            'company_id' => $company->id,
            'start_time' => Carbon::now()->format('Y-m-d h:i:s'),
            'end_time' => Carbon::now()->addHours(2)->format('Y-m-d h:i:s'),
        ]);

        $post = Post::factory()->create();

        $active = TimelinePost::factory()->create([
            'time' => Carbon::now()->addHour()->format('Y-m-d h:i:s'),
            'timeline_id' => $timeline->id,
            'post_id' => $post->id,
        ]);

        $user = User::factory()->create();
        $adminRole = Role::create(['name' => AppRole::ADMIN_ROLE]);
        $user->assignRole(AppRole::ADMIN_ROLE);

        $this->actingAs($user)->getJson(route('posts.index', [
            'active' => $company->id,
        ]))
//            ->assertStatus(200)
            ->assertJson([
                'data' => $active
            ]);
    }

    /**
     * @test
     */
    public function itCanCount()
    {
        $posts = Post::factory()->count(3)->create();

        $this->getJson(route('posts.count'))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'count' => $posts->count()
                ]
            ]);
    }

    /**
     * @test
     */
    public function itCanShow()
    {
        $post = Post::factory()->create();

        $this->getJson(route('posts.show', [
            'id' => $post->id,
        ]))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $post->id,
                ],
            ]);
    }

    /**
     * @test
     */
    public function itCanStore()
    {
        $post = Post::factory()->make();
        $this->postJson(route('posts.store'), $post->toArray())
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'id' => 1
                ],
            ]);

        $this->assertDatabaseHas('posts', [
            'id' => 1
        ]);
    }

    /**
     * It can update
     *
     * @test
     */
    public function itCanUpdate()
    {
        $post = Post::factory()->create();
        $update = Post::factory()->make();

        $this->putJson(route('posts.update', ['id' => $post->id]), $update->toArray())
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $post->id,
                ],
            ]);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
        ]);
    }


    /**
     * @test
     */
    public function itCanDestroy()
    {
        $post = Post::factory()->create();

        $this->deleteJson(route('posts.destroy', ['id' => $post->id]))
            ->assertStatus(200)
            ->assertJson([
                'deleted' => true
            ]);

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    /**
     * @test
     */
    public function itCanUploadFile()
    {
        {
            Storage::fake('local');
            $response = $this->json('POST', '/avatar', [
                'avatar' => UploadedFile::fake()->image('avatar.jpg')
            ]);
            // Assert the file was stored...
            Storage::disk('local')->assertExists('avatar.jpg');
            // Assert a file does not exist...
            Storage::disk('local')->assertMissing('missing.jpg');

        }
    }
}
