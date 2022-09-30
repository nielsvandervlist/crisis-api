<?php

namespace Database\Factories;

use App\Models\Participant;
use App\Models\Reaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'src' => $this->faker->url,
            'status' => $this->faker->boolean,
            'participant_id' => Participant::factory()->create()->id,
            'reaction_id' => Reaction::factory()->create()->id,
        ];
    }
}
