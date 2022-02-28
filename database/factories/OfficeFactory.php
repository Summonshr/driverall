<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name('male'),
            'description'=>$this->faker->realText(500),
            'country'=>$this->faker->countryCode,
            'location'=> ['lat'=>$this->faker->latitude,'lng'=>$this->faker->longitude]
        ];
    }
}