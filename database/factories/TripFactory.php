<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetName,
            'description' => $this->faker->paragraph,
            'country' => $this->faker->countryCode,
            'user_id' => function ($office) {
                return $office['user_id'];
            },
            'location' => ['lat' => $this->faker->latitude, 'lng' => $this->faker->longitude]
        ];
    }
}
