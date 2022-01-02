<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'Schooling' => $this->faker->text(),
            'ProfessionalExperience' => $this->faker->text(),
            'Skills' => $this->faker->text(),
            'ApplicationHistory' => $this->faker->numberBetween(111111111, 999999999),
            'FavoriteAds' => $this->faker->numberBetween(111111111, 999999999),
        ];
    }
}
