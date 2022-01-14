<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Photo;
use App\Models\User;
use App\Models\Anuncio;
use App\Models\Application;

use Illuminate\Support\Facades\Auth;

class EmpresaRegister extends Controller
{    
    protected function create(Request $request)
    {
        $request->validate([
            'nif'=> ['required', 'integer', 'min:9'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images');

        $logo = Photo::create([
            'name' => $name,
            'path' => $request->file('image')->hashName(),
        ]);
        
        $newEmpresa=Empresa::create([
            'user_id' => Auth::id(),
            'nif' => $request['nif'],
            'logo_id' => $logo->id,
        ]);

        $value = true;
        $user = User::find($newEmpresa->user_id);
        $user->setRegistered($value);
        $user->save();
        
        return redirect()->route('home');
    }

    public function remove_empresa($empresa_id){
        $photo_detected = false;
        $empresa = Empresa::where('id', $empresa_id)->first();
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
            $photo_detected = true;
        }
        $user = User::find($empresa->user_id);
        $user->setRegistered(false);
        $user->save();
        $empresa->delete();
        if($photo_detected){
            $photo->delete();
        }
        return redirect()->back()->with('success', 'Company Removed!');
    }
}
