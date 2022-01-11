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

    protected function insert_anuncio(Request $request)
    {
        $request->validate([
            'workspace'=> ['required', 'string', 'max:30'],
            'job_description'=> ['required', 'string', 'max:255'],
            'desired_skills'=> ['required', 'string', 'max:150'],
            'salary' => ['numeric', 'min:0', 'max:9999.99'],
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
        $application = Application::getApplicationByUserIdAnuncioId(Auth::id(), $anuncio->id);
        if ($application){
            $application_sent = true;
        }
        else{
            $application_sent = false; 
        }
        return view('anuncios.show_anuncio')->with(compact('anuncio', 'empresa', 'user', 'photo', 'application_sent'));  
    }

    public function appliance(Request $request, $anuncio){
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:100000',
        ]);
        $name = $request->file('pdf')->getClientOriginalName();
        $request->file('pdf')->store('public/pdf');

        $newApplication = Application::create([
            'user_id' => Auth::id(),
            'anuncio_id' => $anuncio,
            'comment' => $request->comment,
            'pdf_name'=> $name,
            'pdf_path'=> $request->file('pdf')->hashName(),
        ]);
        
        return redirect()->back();
    }
    public function remove_anuncio($anuncio_id){
        Anuncio::getAnuncioById($anuncio_id)->delete();
        return redirect('profile');
    }
}
