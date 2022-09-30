<?php

namespace Database\Factories;

use App\Models\ReactionType;
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
            'notification' => $this->faker->boolean,
            'time' => $this->faker->dateTime,
            'reaction_type_id' => ReactionType::factory()->create()->id
        ];
    }
}
