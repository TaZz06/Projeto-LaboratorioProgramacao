<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Empresa;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
        if ($request->has('pesquisa')){
            $anuncios = Anuncio::where('city', 'like', '%'.$request['pesquisa'].'%')->get();
        }
        else{
            $query = Anuncio::query()->latest();
            $anuncios = $query->get();

            $query = Empresa::query()->latest();
            $empresas = $query->get();

            $query = Photo::query()->latest();
            $photos = $query->get();

            $query = User::query()->latest();
            $users = $query->get();
        }
        return view('home', compact('anuncios', 'empresas', 'photos', 'users'));
    }


    public function adminHome()
    {
        return view('adminhome');
    }
}
