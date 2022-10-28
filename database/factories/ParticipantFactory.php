<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\ParticipantRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
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
            'hash' => Hash::make('plain-text'),
            'email' => $this->faker->email,
            'profile_img' => $this->faker->url,
            'user_id' => User::factory()->create()->id,
            'company_id' => Company::factory()->create()->id,
        ];
    }
}
