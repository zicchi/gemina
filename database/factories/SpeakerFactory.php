<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpeakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->companyEmail,
            'category_id' => 1,
            'bio' => $this->faker->words(20,true),
            'instance' => $this->faker->company,
        ];
    }
}
