<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        Product::factory()->count(5)->create();

        Product::factory()->count(5)->create([
            'date' => now()->subDay(),
            'activated' => false,
        ]);
    }
}
