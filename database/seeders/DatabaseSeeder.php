<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Crisis;
use App\Models\Participant;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\Round;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        Company::factory()->create();
        Crisis::factory()->create();
        Round::factory()->create();
        Post::factory()->create();
        Timeline::factory()->create();
        Reaction::factory()->create();
        Participant::factory()->create();
    }
}
