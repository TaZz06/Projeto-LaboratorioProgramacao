<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Anuncio;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anuncios = Anuncio::all()->paginate(7);
        
        return view('home', compact(['anuncios']));
    }


    public function adminHome()
    {
        return view('adminhome');
    }
}
