<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'user_id' => User::where('type_user', 'E')->get()->random(1)->first()->id,
            'nif' => $this->faker->numberBetween(111111111, 999999999),
            'logo_id' => 1,
        ];
    }
}
