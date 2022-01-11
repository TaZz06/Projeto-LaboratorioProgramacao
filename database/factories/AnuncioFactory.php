<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empresa;


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
            'workspace' => $this->faker->jobTitle(),
            'job_description' => $this->faker->text(),
            'desired_Skills' => $this->faker->text(),
            'salary' => $this->faker->randomFloat(4, 0, 3000),
            'type' => $this->faker->randomElement(['J','I','PI']),
            'city' => $this->faker->city(),
            'empresa_id' => Empresa::all()->random()->id,
        ];
    }
}
