<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;

class CandidatoFactory extends Factory
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
            'ProfissionalArea' => $this->faker->jobTitle(),
            'Schooling' => $this->faker->nullable(),
            'ProfessionalExperience' => $this->faker->nullable(),
            'Skills' => $this->faker->nullable(),
            'ApplicationHistory' => $this->faker->nullable(),
            'FavoriteAds' => $this->faker->nullable(),
        ];
    }
}
