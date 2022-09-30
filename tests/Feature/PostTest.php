<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
