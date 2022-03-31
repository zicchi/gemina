<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::factory()->create([
            'email' => 'user@cc.cc',
            'password' => Hash::make('user'),
            'name' => 'User (Dev)'
        ]);
        User::factory()->count(10)->create();
    }
}
