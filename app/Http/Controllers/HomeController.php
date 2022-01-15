<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;
use App\Models\Empresa;
use App\Models\Photo;
use App\Models\User;
define('USERSNAME', 'users.name');

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
            $infos = DB::table('anuncios')
            ->leftjoin('empresas', 'empresas.id', '=', 'anuncios.empresa_id')
            ->leftjoin('photos', 'photos.id', '=', 'empresas.logo_id')
            ->leftjoin('users','users.id', '=', 'empresas.user_id')
            ->select('anuncios.*', 'anuncios.id as id','empresas.logo_id as logo_id', 'photos.path', USERSNAME)
            ->where('city', 'like', '%'.$request['pesquisa'].'%')->orWhere('workspace', 'like', '%'.$request['pesquisa'].'%')->orWhere(USERSNAME, 'like', '%'.$request['pesquisa'].'%')
            ->orderBy('is_highlighted', 'desc')
            ->paginate(10);
        }
        else{
            $infos = DB::table('anuncios')
            ->leftjoin('empresas', 'empresas.id', '=', 'anuncios.empresa_id')
            ->leftjoin('photos', 'photos.id', '=', 'empresas.logo_id')
            ->leftjoin('users','users.id', '=', 'empresas.user_id')
            ->select('anuncios.*', 'anuncios.id as id','empresas.logo_id as logo_id', 'photos.path', USERSNAME)
            ->orderBy('is_highlighted', 'desc')
            ->paginate(10);
        }
        return view('home', compact('infos'));
    }
}
