<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Anuncio;

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
            'user_id' => User::all()->random()->id,
            'Workspace' => $this->faker->jobTitle(),
            'JobDescription' => $this->faker->nullable(),
            'DesiredSkills' => $this->faker->nullable(),
            'Conditions' => $this->faker->nullable(),
            'Candidates' => Anuncio::all()->random()->id,
            'Type' => $this->faker->nullable(),
        ];
    }
}
