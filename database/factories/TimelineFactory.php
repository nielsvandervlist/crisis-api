<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Crisis;
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
            'duration' => rand(1, 10),
            'online' => $this->faker->boolean,
            'crisis_id' => Crisis::factory()->create()->id,
            'company_id' => Company::factory()->create()->id,
            'user_id' => User::factory()->create()->id
        ];
    }
}
