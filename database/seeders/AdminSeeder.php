<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        Admin::factory()->create([
            'username' => 'dev',
            'password' => Hash::make('dev'),
            'name' => 'Dev',
            'role' => 'superadmin'
        ]);
        Admin::factory()->count(3)->create();
    }
}
