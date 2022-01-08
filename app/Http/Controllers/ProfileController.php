<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidato;
use App\Models\Empresa;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

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
            return view('partials.profile')->with(compact('user','empresa', 'photo'));
        }
    }
}
