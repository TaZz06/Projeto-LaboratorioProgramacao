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
            'profissional_area'=> ['required', 'string', 'max:255'],
            'schooling'=> ['required', 'string', 'max:255'],
            'professional_experience'=> ['required', 'string', 'max:255'],
            'skills'=> ['required', 'string', 'max:255'],
        ]);
        
        $newCandidato=Candidato::create([
            'user_id' => Auth::id(),
            'profissional_area' => $request['profissional_area'],
            'schooling' => $request['schooling'],
            'professional_experience' => $request['professional_experience'],
            'skills'=> $request['skills'],
        ]);
        
        $value = true;
        $user = User::find($newCandidato->user_id);
        $user->setRegistered($value);
        $user->save();
        
        return redirect()->route('home');
    }
}