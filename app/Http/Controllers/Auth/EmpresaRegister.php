<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmpresaRegister extends Controller
{    
    protected function create(Request $request)
    {
        $request->validate([
            'nif'=> ['required', 'integer', 'min:9'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        $newEmpresa=Empresa::create([
            'user_id' => Auth::id(),
            'nif' => $request['nif'],
        ]);

        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images');

        $picture = Photo::create([
            'name' => $name,
            'path' => $request->file('image')->hashName(),
            'user_id' => Auth::id(),
        ]);

        $value = true;
        $user = User::find($newEmpresa->user_id);
        $user->setRegistered($value);
        $user->save();
        
        return view('home')->with('status', 'Empresa registado!');
    }
}
