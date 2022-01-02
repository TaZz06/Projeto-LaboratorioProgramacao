<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidato;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CandidatoRegister extends Controller
{

    protected function create(Request $request)
    {

        $request->validate([
            'ProfissionalArea'=> ['required', 'string', 'max:255'],
            'Schooling'=> ['required', 'string', 'max:255'],
            'ProfessionalExperience'=> ['required', 'string', 'max:255'],
            'Skills'=> ['required', 'string', 'max:255'],
        ]);
        
        $newCandidato=Candidato::create([
            'user_id' => Auth::id(),
            'ProfissionalArea' => $request['ProfissionalArea'],
            'Schooling' => $request['Schooling'],
            'ProfessionalExperience' => $request['ProfessionalExperience'],
            'Skills'=> $request['Skills'],
        ]);

        $value = true;
        $user = User::find($newCandidato->user_id);
        $user->setRegistered($value);
        $user->save();
        
        return view('home')->with('status', 'Candidato registado!');
    }
}