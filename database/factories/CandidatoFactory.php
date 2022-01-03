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
            'profissional_area' => $this->faker->jobTitle(),
            'schooling' => $this->faker->text(),
            'professional_experience' => $this->faker->text(),
            'skills' => $this->faker->text(),
            'application_history' => $this->faker->numberBetween(111111111, 999999999),
            'favorite_ads' => $this->faker->numberBetween(111111111, 999999999),
        ];
    }
}
