<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MusiqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return ['titremus'=>$this->faker->text(100)];
    }
}
