<?php

namespace Database\Seeders;

use App\Models\PostType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostType::factory()->create([
            'name' => 'twitter',
            'label' => 'Twitter',
        ]);
        PostType::factory()->create([
            'name' => 'facebook',
            'label' => 'Facebook',
        ]);
        PostType::factory()->create([
            'name' => 'youtube',
            'label' => 'Youtube',
        ]);
        PostType::factory()->create([
            'name' => 'linkedin',
            'label' => 'Linkedin',
        ]);
        PostType::factory()->create([
            'name' => 'website',
            'label' => 'Website',
        ]);
        PostType::factory()->create([
            'name' => 'instagram',
            'label' => 'Instagram',
        ]);
    }
}
