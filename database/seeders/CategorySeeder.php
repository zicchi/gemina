<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::factory()->create([
            'name' => 'Teknologi'
        ]);
        Category::factory()->create([
            'name' => 'Biologi'
        ]);
        Category::factory()->create([
            'name' => 'Psikologi'
        ]);
        Category::factory()->create([
            'name' => 'Sains'
        ]);
        Category::factory()->create([
            'name' => 'Kesehatan'
        ]);
    }
}
