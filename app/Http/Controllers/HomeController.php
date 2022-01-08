<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;
use App\Models\Empresa;
use App\Models\Photo;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('pesquisa')){
            $infos = Anuncio::where('city', 'like', '%'.$request['pesquisa'].'%')->get();
        }
        else{
            $infos = DB::table('anuncios')
            //->where()
            ->leftjoin('empresas', 'empresas.id', '=', 'anuncios.empresa_id')
            ->leftjoin('photos', 'photos.id', '=', 'empresas.logo_id')
            ->leftjoin('users','users.id', '=', 'empresas.user_id')
            ->select('anuncios.*', 'anuncios.id as id','empresas.logo_id as logo_id', 'photos.path', 'users.name')
            ->get();
        }
        return view('home', compact('infos'));
    }


    public function adminHome()
    {
        return view('adminhome');
    }
}
