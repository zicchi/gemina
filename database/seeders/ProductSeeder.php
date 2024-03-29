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

        Product::factory()->count(2)->create();

        Product::factory()->count(1)->create([
            'date' => now()->subDay(),
            'activated' => false,
        ]);

        Product::factory()->count(1)->create([
            'verified' => false
        ]);
    }
}
