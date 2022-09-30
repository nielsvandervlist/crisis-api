<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Timeline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimelinePost>
 */
class TimelinePostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'time' => $this->faker->dateTime,
            'post_id' => Post::factory()->create()->id,
            'timeline_id' => Timeline::factory()->create()->id,
        ];
    }
}
