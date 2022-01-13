<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Application;
use App\Models\Empresa;
use App\Models\Candidato;
use App\Models\User;
use App\Models\Photo;

use Illuminate\Support\Facades\DB;


class AdminHomeController extends Controller
{
    public function index(Request $request)
    {   
        $users = User::count();
        $anuncios = Anuncio::count();
        $candidatos = Candidato::count();
        $empresas = Empresa::count();
        $applications = Application::count();
        return view('layouts.admin_home')->with(compact('users', 'anuncios', 'candidatos', 'empresas', 'applications'));
    }

    public function users_dashboard(Request $request)
    {   
        $users = User::count();
        $anuncios = Anuncio::count();
        $candidatos = Candidato::count();
        $empresas = Empresa::count();
        $applications = Application::count();
        $infos = User::all();
        return view('admin.users')->with(compact('users', 'anuncios', 'candidatos', 'empresas', 'applications', 'infos'));
    }
    
    public function candidates_dashboard(Request $request)
    {   
        $users = User::count();
        $anuncios = Anuncio::count();
        $candidatos = Candidato::count();
        $empresas = Empresa::count();
        $applications = Application::count();
        $infos = DB::table('candidatos')
                ->leftjoin('users', 'users.id', '=', 'candidatos.user_id')
                ->get();
        return view('admin.candidatos')->with(compact('users', 'anuncios', 'candidatos', 'empresas', 'applications', 'infos'));
    }

    public function companies_dashboard(Request $request)
    {   
        $users = User::count();
        $anuncios = Anuncio::count();
        $candidatos = Candidato::count();
        $empresas = Empresa::count();
        $applications = Application::count();
        $infos = DB::table('empresas')
        ->leftjoin('users', 'users.id', '=', 'empresas.user_id')
        ->select('empresas.*', 'users.*', 'empresas.id as empresas_id')
        ->get();
        return view('admin.empresas')->with(compact('users', 'anuncios', 'candidatos', 'empresas', 'applications', 'infos'));
    }

    public function anuncios_dashboard(Request $request)
    {   
        $users = User::count();
        $anuncios = Anuncio::count();
        $candidatos = Candidato::count();
        $empresas = Empresa::count();
        $applications = Application::count();
        $infos = DB::table('anuncios')
        ->leftjoin('empresas', 'anuncios.empresa_id', '=', 'empresas.id')
        ->leftjoin('users', 'users.id', '=', 'empresas.user_id')
        ->select('anuncios.*', 'users.*', 'anuncios.id as idAnuncio', 'users.id as user_id')
        ->get();
        return view('admin.anuncios')->with(compact('users', 'anuncios', 'candidatos', 'empresas', 'applications', 'infos'));
    }

    public function applications_dashboard(Request $request)
    {   
        $users = User::count();
        $anuncios = Anuncio::count();
        $candidatos = Candidato::count();
        $empresas = Empresa::count();
        $applications = Application::count();
        $infos = DB::table('applications')
        ->leftjoin('users', 'users.id', '=', 'applications.user_id')
        ->leftjoin('anuncios', 'anuncios.id', '=', 'applications.anuncio_id')
        ->select('applications.*', 'users.*', 'anuncios.*', 'applications.id as application_id')
        ->get();
        return view('admin.applications')->with(compact('users', 'anuncios', 'candidatos', 'empresas', 'applications', 'infos'));
    }
    
    public function remove_user($user_id){
        $user = User::where('id', $user_id)->first();
        if($user->type_user == 'C'){
            $applications = Application::getAllApplicationByUserId($user_id);
            foreach($applications as $application){
                $pdf_path = public_path().'/storage/pdf/'. $application->pdf_path; 
                unlink($pdf_path);
                $application->delete();
            }
            $candidato = Candidato::getCandidatoById($user_id);
            if($candidato->photo_id != 1){
                $photo = Photo::where('id', $candidato->photo_id)->first();
                $photo_path = public_path().'/storage/images/'. $photo->path; 
                unlink($photo_path);
            }

            $user = User::find($user_id);
            $user->setRegistered(false);
            $user->save();
            Candidato::getCandidatoById($user_id)->delete();
            $user->delete();
        }
        elseif($user->type_user == 'E'){
            $empresa = Empresa::where('user_id', $user->id)->first();
            $anuncios = Anuncio::where('empresa_id', $empresa->id)->get();
            if($anuncios){
                foreach ($anuncios  as $anuncio){
                    $applications = Application::where('anuncio_id', $anuncio->id)->get();
                    if($applications){
                        foreach ($applications  as $application){
                            $application->delete();
                        }
                    }
                    $anuncio->delete();
                }
            }
            if($empresa->logo_id != 1){
                $photo = Photo::where('id', $empresa->logo_id)->first();
                $photo_path = public_path().'/storage/images/'. $photo->path; 
                unlink($photo_path);
            }
            $user = User::find($empresa->user_id);
            $user->setRegistered(false);
            $user->save();
            $empresa->delete();
            $user->delete();
        }
        return redirect()->back();
    }

    public function promote_demote_user($user_id){
        $user = User::where('id', $user_id)->first();
        if($user->is_admin == true){
            $user->setAdmin(false);
            $user->save();
        }
        else{
            $user->setAdmin(true);
            $user->save();
        }
        return redirect()->back();
    }
}
