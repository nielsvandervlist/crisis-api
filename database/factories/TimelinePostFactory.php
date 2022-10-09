<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Timeline;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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
            'time' => Carbon::now()->format('Y-m-d h:i:s'),
            'post_id' => Post::factory()->create()->id,
            'timeline_id' => Timeline::factory()->create()->id,
        ];
    }
}
