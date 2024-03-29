<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidato;
use App\Models\Empresa;
use App\Models\Photo;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Application;
use App\Models\Anuncio;
define('MAXLENGTH', 'max:255');

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }
    
    protected function create(Request $data)
    {
        $data->validate([
            'name' => ['required', 'string', MAXLENGTH],
            'address' => ['required', 'string', MAXLENGTH],
            'email' => ['required', 'string', 'email', MAXLENGTH, 'unique:users'],
            'contact'=> ['required', 'string', 'min:9'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'flexRadioDefault' => ['required'],
        ]);
        
        $newUser = User::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'contact'=> $data['contact'],
            'password' => Hash::make($data['password']),
            'type_user' => $data['flexRadioDefault'],
            'registered' => false,
        ]);
        
        $newUser->createAsStripeCustomer();

        Auth::login($newUser);
        return redirect()->route('home');
    }
}
