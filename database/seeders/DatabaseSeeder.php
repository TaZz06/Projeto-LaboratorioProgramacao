<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(50)->create();
        \App\Models\Empresa::factory(15)->create();
        \App\Models\Candidato::factory(35)->create();
        \App\Models\Anuncio::factory(20)->create();
    }
}