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
            'read' => $this->faker->boolean,
        ];
    }
}
