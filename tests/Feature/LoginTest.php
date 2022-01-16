<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function login_sucessful()
    {
        $this->visit('/login')
        ->type('ricpinheiro06@gmail.com', 'email')
        ->type('password', 'password')
        ->press('Login')
        ->seePageIs('/admin_home');
    }
}
