<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Seminar '.$this->faker->unique()->company,
            'description' => $this->faker->words(20,true),
            'initiator_id' => 1,
            'initiator_type' => User::class,
            'date' => now()->addDays(rand(1,10)),
            'category_id' => 1,
            'fee' => 0,
            'activated' => true,
            'capacity' => 100,
            'online' => false,
            'image' => '',
            'speaker' => $this->faker->name,
            'place' => $this->faker->address,
            'contact' => $this->faker->numerify('0812########'),
            'verified' => true,
        ];
    }
}
