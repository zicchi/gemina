<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->words(3,true),
            'answer' => $this->faker->words(20,true),
        ];
    }
}
