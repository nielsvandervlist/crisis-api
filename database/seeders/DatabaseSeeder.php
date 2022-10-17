<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Crisis;
use App\Models\Post;
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
        User::factory()->count(10)->create();
        Company::factory()->count(10)->create();
        Crisis::factory()->count(10)->create();
        Post::factory()->count(10)->create();
        Timeline::factory()->count(10)->create();
    }
}
