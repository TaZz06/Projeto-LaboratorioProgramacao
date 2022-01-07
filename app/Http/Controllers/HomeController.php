<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Anuncio;
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
            $anuncios = DB::table('anuncios')->get();
        }
        return view('home', ['anuncios' => $anuncios]);
    }


    public function adminHome()
    {
        return view('adminhome');
    }
}
