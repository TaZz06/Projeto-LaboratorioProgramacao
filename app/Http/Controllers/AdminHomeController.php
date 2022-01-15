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
define('USERSID', 'users.id');
define('CANDIDATOSUSERID', 'candidatos.user_id');
define('EMPRESASUSERID', 'empresas.user_id');
define('CANDIDATOSPHOTOID', 'candidatos.photo_id');
define('PHOTOSID', 'photos.id');
define('EMPRESASLOGOID', 'empresas.logo_id');
define('PHOTOPATH', 'photos.path');
define('USERS', 'users.*');

class AdminHomeController extends Controller
{
    
    public static function counter()
    {   
        return array(User::count(), Anuncio::count(), Candidato::count(), Empresa::count(), Application::count());
    }

    public function index(Request $request)
    {   
        $counter = AdminHomeController::counter();
        return view('layouts.admin_home')->with(compact('counter'));
    }

    public function users_dashboard(Request $request)
    {   
        $counter = AdminHomeController::counter();
        $infos = DB::table('users')
                ->leftjoin('candidatos', CANDIDATOSUSERID, '=', USERSID)
                ->leftjoin('empresas', EMPRESASUSERID, '=', USERSID)
                ->join('photos', function ($join) {
                    $join->on(PHOTOSID, '=', CANDIDATOSPHOTOID)
                         ->orOn(PHOTOSID, '=', EMPRESASLOGOID);
                })
                ->select(USERS, PHOTOPATH)
                ->get();

        return view('admin.users')->with(compact('counter', 'infos'));
    }
    
    public function candidates_dashboard(Request $request)
    {   
        $counter = AdminHomeController::counter();
        $infos = DB::table('candidatos')
                ->leftjoin('users', USERSID, '=', CANDIDATOSUSERID)
                ->leftJoin('photos', PHOTOSID, '=', CANDIDATOSPHOTOID)
                ->select('candidatos.*', USERS, PHOTOPATH)
                ->get();

        return view('admin.candidatos')->with(compact('counter', 'infos'));
    }

    public function companies_dashboard(Request $request)
    {   
        $counter = AdminHomeController::counter();
        $infos = DB::table('empresas')
                ->leftjoin('users', USERSID, '=', EMPRESASUSERID)
                ->leftJoin('photos', PHOTOSID, '=', EMPRESASLOGOID)
                ->select('empresas.*', USERS, 'empresas.id as empresas_id', PHOTOPATH)
                ->get();

        return view('admin.empresas')->with(compact('counter', 'infos'));
    }

    public function anuncios_dashboard(Request $request)
    {   
        $counter = AdminHomeController::counter();
        $infos = DB::table('anuncios')
                ->leftjoin('empresas', 'anuncios.empresa_id', '=', 'empresas.id')
                ->leftjoin('users', USERSID, '=', EMPRESASUSERID)
                ->leftJoin('photos', PHOTOSID, '=', EMPRESASLOGOID)
                ->select('anuncios.*', USERS, 'anuncios.id as idAnuncio', USERSID . ' as user_id', PHOTOPATH)
                ->get();

        return view('admin.anuncios')->with(compact('counter', 'infos'));
    }

    public function applications_dashboard(Request $request)
    {   
        $counter = AdminHomeController::counter();
        $infos = DB::table('applications')
                ->leftjoin('users', USERSID, '=', 'applications.user_id')
                ->leftjoin('anuncios', 'anuncios.id', '=', 'applications.anuncio_id')
                ->leftJoin('candidatos', CANDIDATOSUSERID, '=', USERSID)
                ->leftJoin('photos', PHOTOSID, '=', CANDIDATOSPHOTOID)
                ->select('applications.*', USERS, 'anuncios.*', 'applications.id as application_id', PHOTOPATH)
                ->get();

        return view('admin.applications')->with(compact('counter', 'infos'));
    }
    
    public function remove_user($user_id){
        $user = User::where('id', $user_id)->first();
        if($user->type_user == 'C'){
            $applications = Application::getAllApplicationByUserId($user_id);
            foreach($applications as $application){
                $pdf_path = public_path().'/storage/pdf/'. $application->pdf_path; 
                unlink($pdf_path);
            }
            $candidato = Candidato::getCandidatoById($user_id);
            if($candidato->photo_id != 1){
                $photo = Photo::where('id', $candidato->photo_id)->first();
                $photo_path = public_path().'/storage/images/'. $photo->path; 
                unlink($photo_path);
                $photo->delete();
            }
        }
        elseif($user->type_user == 'E'){
            $empresa = Empresa::where('user_id', $user->id)->first();
            if($empresa->logo_id != 1){
                $photo = Photo::where('id', $empresa->logo_id)->first();
                $photo_path = public_path().'/storage/images/'. $photo->path; 
                unlink($photo_path);
                $photo->delete();
            }
        }
        $user->delete();
        return redirect()->back()->with('success', 'User removed!');
    }

    public function promote_demote_user($user_id){
        $user = User::where('id', $user_id)->first();
        if($user->is_admin){
            $user->setAdmin(false);
            $user->save();
            return redirect()->back()->with('success', 'User Demoted!');
        }
        else{
            $user->setAdmin(true);
            $user->save();
            return redirect()->back()->with('success', 'User Promoted!');
        }
    }
}
