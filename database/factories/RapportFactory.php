<?php

namespace Database\Factories;

use App\Models\Crisis;
use App\Models\Point;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rapport>
 */
class RapportFactory extends Factory
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
            'reaction_score' => rand(1, 10),
            'sharing_score' => rand(1, 10),
            'content_score' => rand(1, 10),
            'crisis_id' => Crisis::factory()->create()->id,
        ];
    }
}
