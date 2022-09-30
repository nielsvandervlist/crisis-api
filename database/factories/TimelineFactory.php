<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timeline>
 */
class TimelineFactory extends Factory
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
            'start_time' => $this->faker->dateTime,
            'end_time' => $this->faker->dateTime,
            'company_id' => Company::factory()->create()->id,
            'user_id' => User::factory()->create()->id
        ];
    }
}
