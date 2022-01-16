<?php

namespace Tests\Feature;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Anuncio;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AnuncioTest extends TestCase
{
    public function test_insert_anuncio_when_nothing_is_inserted(){
        $empresa = Empresa::where('id', 31)->first();
        $user = User::where('id', $empresa->user_id)->first();
        Auth::login($user);
        $this->actingAs($user)
             ->visit('insert_anuncio_form')
             ->assertViewMissing('insert_anuncio_form');
    }

    public function test_button_apply_after_appliance_anuncio(){
        $application = Application::first();
        $anuncio= Anuncio::where('id', $application->anuncio_id)->first();
        $user = User::where('id', $application->user_id)->first();
        Auth::login($user);
        $this->actingAs($user)
             ->visit('anuncio/'.$anuncio->id)
             ->see('Already Applied');
    }
    
    public function test_if_random_number_is_inserted_in_search_no_opportunity_is_shown(){
        $faker = \Faker\Factory::create();
        $search = $faker->randomDigit();
        $this->visit('home')
             ->type($search, 'pesquisa')
             ->press('Search')
             ->see('Opportunities: ( 0 )');
    }
}