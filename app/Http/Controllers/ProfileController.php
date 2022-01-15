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
define('PROFILEVIEW', 'profile.profile');
define('MAXLENGTH', 'max:255');

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::getUserById(Auth::id());
        if($user->type_user == 'C'){
            $candidato = Candidato::getCandidatoById(Auth::id());
            $photo = Photo::getPhotoById($candidato->photo_id);

            $infos = DB::table('applications')
                ->leftjoin('users', 'users.id', '=', 'applications.user_id')
                ->leftjoin('anuncios', 'anuncios.id', '=', 'applications.anuncio_id')
                ->select('applications.*','applications.id as application_id', 'applications.user_id as user_id', 'applications.anuncio_id as anuncio_id', 'users.name as user_name', 'anuncios.*', 'anuncios.id as idAnuncio', 'applications.created_at as applied_at')
                ->where('user_id', '=', Auth::id())
                ->get();
                
            if($infos){
                return view(PROFILEVIEW)->with(compact('user','candidato', 'photo', 'infos'));
            }
            return view(PROFILEVIEW)->with(compact('user', 'candidato', 'photo'));
        }
        else if ($user->type_user == 'E'){
            $empresa_id = Empresa::getEmpresaId(Auth::id());
            $empresa = Empresa::getEmpresaById($empresa_id);
            $photo = Photo::getPhotoById($empresa->logo_id);

            $anuncios = Anuncio::where('empresa_id', $empresa_id)->get();
            if($anuncios){
                $infos = DB::table('applications')
                ->leftjoin('users', 'users.id', '=', 'applications.user_id')
                ->select('applications.*', 'applications.id as application_id', 'applications.user_id as user_id', 'applications.anuncio_id as anuncio_id', 'users.name as user_name')
                ->get();
                
                if($infos){
                    return view(PROFILEVIEW)->with(compact('user','empresa', 'photo', 'anuncios', 'infos'));
                }
                return view(PROFILEVIEW)->with(compact('user','empresa', 'photo', 'anuncios'));
            }
            return view(PROFILEVIEW)->with(compact('user','empresa', 'photo'));
        }
    }

    public function edit_index(){
        $user = User::getUserById(Auth::id());
        if($user->type_user == 'C'){
            $candidato = Candidato::getCandidatoById(Auth::id());
            return view('profile.edit_profile')->with(compact('user', 'candidato'));
        }
        else if ($user->type_user == 'E'){
            $empresa_id = Empresa::getEmpresaId(Auth::id());
            $empresa = Empresa::getEmpresaById($empresa_id);
            $photo = Photo::getPhotoById($empresa->logo_id);
            return view('profile.edit_profile')->with(compact('user','empresa', 'photo'));
        }
    }

    public function edit_profile(Request $data){
        $data->validate([
            'name' => ['required', 'string', MAXLENGTH],
            'address' => ['required', 'string', MAXLENGTH],
            'email' => ['required', 'string', 'email', MAXLENGTH],
            'contact'=> ['required', 'string', 'min:9'],
        ]);


        $user = User::getUserById(Auth::id());
        DB::table('users')->where('id', $user->id)->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'contact'=> $data['contact'],
            'email' => $data['email'],
        ]);
        $user->save();
        
        if($user->type_user == 'C'){
            $data->validate([
                'profissional_area'=> ['required', 'string', MAXLENGTH],
                'schooling'=> ['required', 'string', MAXLENGTH],
                'professional_experience'=> ['required', 'string', MAXLENGTH],
                'skills'=> ['required', 'string', MAXLENGTH],
            ]);

            $candidato = Candidato::getCandidatoById(Auth::id());
            DB::table('candidatos')->where('id', $candidato->id)->update([
                'profissional_area' => $data['profissional_area'],
                'schooling' => $data['schooling'],
                'professional_experience' => $data['professional_experience'],
                'skills'=> $data['skills'],
            ]);
            $candidato->save();
        }
        else if ($user->type_user == 'E'){
            $data->validate([
                'nif'=> ['required', 'integer', 'min:9'],
            ]);
        
            $empresa_id = Empresa::getEmpresaId(Auth::id());
            $empresa = Empresa::getEmpresaById($empresa_id);

            DB::table('empresas')->where('id', $empresa_id)->update([
                'nif' => $data['nif'],
                'description' => $data['description'],
            ]);
            $empresa->save();
        }
        return redirect('profile')->with('success', 'Profile Picture Updated!');
    }

    public function edit_profile_photo(Request $request, $photo_id, $user_id){
        $photo_detected = false;
        $request->validate([
            'profile_pic' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('profile_pic')->getClientOriginalName();
        $request->file('profile_pic')->store('public/images');

        $picture = Photo::create([
            'name' => $name,
            'path' => $request->file('profile_pic')->hashName(),
        ]);

        $photo = Photo::where('id', $photo_id)->first();
        if($photo_id != 1){
            $photo_path = public_path().'/storage/images/'. $photo->path;
            unlink($photo_path);
            $photo_detected = true;
        }
        $user = User::where('id', $user_id)->first();
        if($user->type_user == 'C'){
            $candidato = Candidato::where('user_id', $user->id)->first();
            DB::table('candidatos')->where('user_id', $user_id)->update([
                'photo_id' => $picture->id,
            ]);
            $candidato->save();
        }elseif($user->type_user == 'E'){
            $empresa = Empresa::where('user_id', $user->id)->first();
            DB::table('empresas')->where('user_id', $user_id)->update([
                'logo_id' => $picture->id,
            ]);
            if($photo_detected){
                $photo->delete();
            }
            $empresa->save();
        }
        return redirect('profile')->with('success', 'Profile Picture Updated!');
    }
}