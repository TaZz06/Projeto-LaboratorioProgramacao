<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;

class AnuncioController extends Controller
{

    protected function insertAnuncio(Request $request)
    {
        $request->validate([
            'workspace'=> ['required', 'string', 'max:30'],
            'job_description'=> ['required', 'string', 'max:255'],
            'desired_skills'=> ['required', 'string', 'max:150'],
            'address' => ['required', 'string', 'max:255'],
            'type'=> ['required', 'string', 'max:2'],
        ]);
        
        $newAnuncio=Anuncio::create([
            'empresa_id' => Empresa::getEmpresaId(Auth::id()),
            'workspace' => $request['workspace'],
            'job_description' => $request['job_description'],
            'desired_skills' => $request['desired_skills'],
            'salary'=> $request['salary'],
            'address' => $request['address'],
            'type'=> $request['type'],
        ]);
        return view('partials.profile')->with('status', 'Anuncio inserido!');
    }

    protected function indexInsertAnuncio(){
        return view('anuncios.insert_anuncio');
    }
}
