<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use App\Models\Candidato;
use App\Models\Empresa;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::getUserById(Auth::id());
        if($user->type_user == 'C'){
            $candidato = Candidato::getCandidatoById(Auth::id());
            return view('partials.profile')->with(compact('user', 'candidato'));
        }
        else if ($user->type_user == 'E'){
            $empresa_id = Empresa::getEmpresaId(Auth::id());
            $empresa = Empresa::getEmpresaById($empresa_id);
            $photo = Photo::getPhotoById($empresa->logo_id);


            $anuncios = Anuncio::where('empresa_id', $empresa_id)->get();
            if($anuncios){
                $infos = DB::table('applications')
                ->leftjoin('users', 'users.id', '=', 'applications.user_id')
                ->select('applications.*', 'applications.id as id', 'applications.user_id as user_id', 'applications.anuncio_id as anuncio_id', 'users.name as user_name')
                ->get();
                
                if($infos){
                    return view('partials.profile')->with(compact('user','empresa', 'photo', 'anuncios', 'infos'));
                }
                return view('partials.profile')->with(compact('user','empresa', 'photo', 'anuncios'));
            }
            return view('partials.profile')->with(compact('user','empresa', 'photo'));
        }
    }

    public function edit_index(){
        $user = User::getUserById(Auth::id());
        if($user->type_user == 'C'){
            $candidato = Candidato::getCandidatoById(Auth::id());
            return view('partials.edit_profile')->with(compact('user', 'candidato'));
        }
        else if ($user->type_user == 'E'){
            $empresa_id = Empresa::getEmpresaId(Auth::id());
            $empresa = Empresa::getEmpresaById($empresa_id);
            $photo = Photo::getPhotoById($empresa->logo_id);
            return view('partials.edit_profile')->with(compact('user','empresa', 'photo'));
        }
    }

    public function edit_profile(Request $data){
        $user = User::getUserById(Auth::id());
        $updateUser = DB::table('users')->where('id', $user->id)->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'contact'=> $data['contact'],
            'email' => $data['email'],
        ]);
        $user->save();
        
        if($user->type_user == 'C'){
            $candidato = Candidato::getCandidatoById(Auth::id());
            $updateCandidato = DB::table('candidatos')->where('id', $candidato->id)->update([
                'profissional_area' => $data['profissional_area'],
                'schooling' => $data['schooling'],
                'professional_experience' => $data['professional_experience'],
                'skills'=> $data['skills'],
            ]);
            $candidato->save();
            $user = User::getUserById(Auth::id());
            $candidato = Candidato::getCandidatoById(Auth::id());
            return view('partials.profile')->with(compact('user', 'candidato'));
        }
        else if ($user->type_user == 'E'){
            $empresa_id = Empresa::getEmpresaId(Auth::id());
            $empresa = Empresa::getEmpresaById($empresa_id);
            $photo = Photo::getPhotoById($empresa->logo_id);

            $updateEmpresa = DB::table('empresas')->where('id', $empresa_id)->update([
                'nif' => $data['nif'],
            ]);
            $empresa->save();
            
            $empresa_id = Empresa::getEmpresaId(Auth::id());
            $empresa = Empresa::getEmpresaById($empresa_id);
            $photo = Photo::getPhotoById($empresa->logo_id);
            $anuncios = Anuncio::where('empresa_id', $empresa_id)->get();
            if($anuncios){
                $infos = DB::table('applications')
                ->leftjoin('users', 'users.id', '=', 'applications.user_id')
                ->select('applications.*', 'applications.id as id', 'applications.user_id as user_id', 'applications.anuncio_id as anuncio_id', 'users.name as user_name')
                ->get();
                
                if($infos){
                    return view('partials.profile')->with(compact('user','empresa', 'photo', 'anuncios', 'infos'));
                }
                return view('partials.profile')->with(compact('user','empresa', 'photo', 'anuncios'));
            }
            return view('partials.profile')->with(compact('user','empresa', 'photo'));
        }
    }
}
