<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speaker::truncate();
        Speaker::factory()->count(10)->create([
            'activated' => true
        ]);

        Speaker::factory()->count(2)->create([
            'activated' => false
        ]);

    }
}
