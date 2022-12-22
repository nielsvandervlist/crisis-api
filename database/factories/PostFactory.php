<?php

namespace Database\Factories;

use App\Models\PostType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'thumbnail' => $this->faker->image('public/storage/images',400,300, null, false),
            'user_id' => User::factory()->create()->id,
            'post_type_id' => PostType::factory()->create()->id
        ];
    }
}
