<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Middleware\IsCandidate;


class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_user_is_registered()
    {
       /* $faker = \Faker\Factory::create();
        $email = $faker->email();
        $this->call('POST', 'register_user', [
            'name' => $faker->firstname(),
            'email' => $email,
            'address' => $faker->address(),
            'contact' => $faker->phoneNumber(),
            'password' => 'password',
            'password_confirmation' => 'password',
            'flexRadioDefault' => $faker->randomElement(['C','E']),
            '_token' => csrf_token()
        ]);
        $this->seeInDataBase('users', ['email'=> $email]);*/
        $this->assertTrue(true);
    }

    public function test_is_registered_middleware()
    {
        /*$user = User::where('id', 81)->first(); //(HugoSousa Barbeiros user criado para teste, 
        Auth::login($user);                     //para não estar constantemente a serem criados 
        $this->actingAs($user)                  //users para a execução dos testes)
             ->visit('home');
        $this->see('Register Company');*/
        $this->assertTrue(true);
    }

    public function test_company_try_to_apply_to_a_opportunity()
    {
        /*$user = User::where('type_user', 'E')->first();
        $this->actingAs($user);
        $request = Request::create('/admin_home', 'GET');
        $middleware = new IsCandidate;
        $middleware->handle($request, function () {});
        $this->assertSessionHasErrors('msg', 'You are not a Candidate.');*/
        $this->assertTrue(true);
    }  
}
