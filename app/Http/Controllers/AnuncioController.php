<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Application;
use App\Models\Empresa;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AnuncioController extends Controller
{
    protected function indexInsertAnuncio(){
        return view('anuncios.insert_anuncio');
    }

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

        return redirect()->route('home');
    }

    protected function show($anuncio_received){
        $anuncio = Anuncio::getAnuncioById($anuncio_received);
        $empresa = Empresa::getEmpresaById($anuncio->empresa_id);
        $user = User::getUserById($empresa->user_id);
        $photo = Photo::getPhotoById($empresa->logo_id);

        return view('anuncios.show_anuncio')->with(compact('anuncio', 'empresa', 'user', 'photo'));
    }

    public function appliance(Request $request, $id){
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:10000',
        ]);

        $name = $request->file('pdf')->getClientOriginalName();
        $request->file('pdf')->store('public/pdf');

        $newApplication = Application::create([
            'user_id' => Auth::id(),
            'anuncio_id' => $id,
            'comment' => $request->comment,
            'pdf_name'=> $name,
            'pdf_path'=> $request->file('pdf')->hashName(),
        ]);
        
        return redirect()->back();
    }
}
