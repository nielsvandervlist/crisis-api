<?php

namespace Database\Factories;

use App\Models\Crisis;
use App\Models\Timeline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'number' => rand(1, 10),
            'timeline_id' => Timeline::factory()->create()->id,
            'crisis_id' => Crisis::factory()->create()->id,
        ];
    }
}
