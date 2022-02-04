<?php

namespace Database\Factories;

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
            'name' => $this->faker->unique()->company,
            'user_id' => 1,
            'date' => now(),
            'category_id' => 1,
            'fee' => 0,
            'activated' => true,
            'capacity' => 100,
            'online' => false,
            'imageUrl' => '',
            'speaker' => $this->faker->name,
            'place' => $this->faker->address,
        ];
    }
}
