<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::truncate();
        Faq::factory()->create([
            'question' => 'Apa itu Gemina ?',
            'answer' => 'Aplikasi “Gemina” merupakan aplikasi berbasis web khusus yang hanya mencakup tentang webinar serta fitur pencarian pembicara.'
        ]);
    }
}
