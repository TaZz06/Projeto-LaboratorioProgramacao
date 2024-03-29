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
            'user_id' => User::where('type_user', 'C')->get()->random(1)->first()->id,
            'profissional_area' => $this->faker->jobTitle(),
            'schooling' => $this->faker->text(),
            'professional_experience' => $this->faker->text(),
            'skills' => $this->faker->text(),
            'photo_id' => 1,
        ];
    }
}
