<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class AnuncioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Workspace' => $this->faker->jobTitle(),
            'JobDescription' => $this->faker->text(),
            'DesiredSkills' => $this->faker->text(),
            'Conditions' => $this->faker->text(),
            'Candidates' => $this->faker->numberBetween(1,50),
            'Type' => $this->faker->text(),
        ];
    }
}
