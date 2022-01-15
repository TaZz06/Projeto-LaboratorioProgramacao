<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CandidatoRegister extends Controller
{

    protected function create(Request $request)
    {

        $request->validate([
            'profissional_area'=> ['required', 'string', MAXLENGTH],
            'schooling'=> ['required', 'string', MAXLENGTH],
            'professional_experience'=> ['required', 'string', MAXLENGTH],
            'skills'=> ['required', 'string', MAXLENGTH],
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

    public function remove_candidato($user_id)
    {   
        $candidato = Candidato::getCandidatoById($user_id);
        $applications = Application::where('candidato_id', $candidato);
        foreach($applications as $application){
            $pdf_path = public_path().'/storage/pdf/'. $application->pdf_path; 
            unlink($pdf_path);
        }
        
        if($candidato->photo_id != 1){
            $photo = Photo::where('id', $candidato->photo_id)->first();
            $photo_path = public_path().'/storage/images/'. $photo->path;
            unlink($photo_path);
            $photo->delete();
        }
        
        $user = User::find($user_id);
        $user->setRegistered(false);
        $user->save();
        $candidato->delete();
        return redirect()->back()->with('success', 'Candidate Removed!');
    }
}