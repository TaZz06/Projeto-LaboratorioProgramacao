<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;

class EmpresaFactory extends Factory
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
            'nif' => $this->faker->numberBetween(111111111, 999999999),
            'logo' => $this->faker->image(),
        ];
    }
}
