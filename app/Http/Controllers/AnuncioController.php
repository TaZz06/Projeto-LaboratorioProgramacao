<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Empresa;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AnuncioController extends Controller
{

    protected function insertAnuncio(Request $request)
    {
        $request->validate([
            'workspace'=> ['required', 'string', 'max:30'],
            'job_description'=> ['required', 'string', 'max:255'],
            'desired_skills'=> ['required', 'string', 'max:150'],
            'city' => ['required', 'string', 'max:255'],
            'type'=> ['required', 'string', 'max:2'],
        ]);
        
        $newAnuncio=Anuncio::create([
            'empresa_id' => Empresa::getEmpresaId(Auth::id()),
            'workspace' => $request['workspace'],
            'job_description' => $request['job_description'],
            'desired_skills' => $request['desired_skills'],
            'salary'=> $request['salary'],
            'city' => $request['city'],
            'type'=> $request['type'],
        ]);
        return view('partials.profile')->with('status', 'Anuncio inserido!');
    }

    protected function indexInsertAnuncio(){
        return view('anuncios.insert_anuncio');
    }

    protected function show(Anuncio $anuncio, Request $request){
        $empresa = Empresa::getEmpresaById($anuncio->empresa_id);
        $user = User::getUserById($empresa->user_id);
        $photo = Photo::getPhotoById($empresa->logo_id);
        return view('anuncios.show_anuncio')->with(compact('anuncio', 'empresa', 'user', 'photo'));
    }
}
