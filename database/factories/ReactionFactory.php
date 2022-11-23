<?php

namespace Database\Factories;

use App\Models\Crisis;
use App\Models\TimelinePost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reaction>
 */
class ReactionFactory extends Factory
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
            'thumbnail' => $this->faker->url,
            'src' => $this->faker->url,
            'score' => rand(1, 10),
            'timeline_post_id' => TimelinePost::factory()->create()->id,
            'crisis_id' => Crisis::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
