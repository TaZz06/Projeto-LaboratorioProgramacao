<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Application;
use App\Models\Empresa;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AnuncioController extends Controller
{
    protected function indexInsertAnuncio(){
        return view('anuncios.insert_anuncio');
    }

    protected function indexEditAnuncio($anuncio_id){
        $anuncio = Anuncio::where('id', $anuncio_id)->first();
        return view('anuncios.edit_anuncio')->with(compact('anuncio'));
    }

    protected function insert_anuncio(Request $request)
    {
        $request->validate([
            'workspace'=> ['required', 'string', 'max:50'],
            'job_description'=> ['required'],
            'desired_skills'=> ['required'],
            'salary' => ['numeric', 'min:0', 'max:9999.99'],
            'city' => ['required', 'string', 'max:30'],
            'type'=> ['required', 'string', 'max:2'],
            'payment_method_id' => 'required'
        ]);
        
        try {
            $amount = 1500; // 15.00 EUR em centimos
            if ($request->filled('is_highlighted')) {
                $amount += 2000;// 20.00 EUR em centimos (acréscimo se desejar dar highlight)
            }
            $user = Auth::user();
            
            $user->createOrGetStripeCustomer();
            
            $user->charge($amount, $request->payment_method_id);

            $newAnuncio=Anuncio::create([
                'empresa_id' => Empresa::getEmpresaId(Auth::id()),
                'workspace' => $request['workspace'],
                'job_description' => $request['job_description'],
                'desired_skills' => $request['desired_skills'],
                'salary'=> $request['salary'],
                'city' => $request['city'],
                'type'=> $request['type'],
                'is_highlighted' => $request->filled('is_highlighted'),
            ]);
            return redirect()->route('home')->with('success', 'Opportunity Created!');
        } catch(\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
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

    protected function edit_anuncio(Request $request, $anuncio_id){
        $anuncio = Anuncio::getAnuncioById($anuncio_id);
        $updateAnuncio = DB::table('anuncios')->where('id', $anuncio_id)->update([
            'workspace' => $request['workspace'],
            'job_description' => $request['job_description'],
            'desired_skills' => $request['desired_skills'],
            'salary'=> $request['salary'],
            'city' => $request['city'],
            'type'=> $request['type'],
        ]);
        $anuncio->save();
        return redirect('profile')->with('success', 'Opportunity updated!');
    }
    
    public function remove_anuncio($anuncio_id){
        $applications = Application::where('anuncio_id', $anuncio_id)->get();
        if($applications){
            foreach ($applications  as $application){
                $application->delete();
            }
        }
        Anuncio::getAnuncioById($anuncio_id)->delete();
        return redirect()->back()->with('success', 'Opportunity Removed!');
    }
}
