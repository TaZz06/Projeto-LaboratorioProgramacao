<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anuncio;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    protected function appliance(Request $request, $anuncio){
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:100000',
        ]);
        $name = $request->file('pdf')->getClientOriginalName();
        $request->file('pdf')->store('public/pdf');

        Application::create([
            'user_id' => Auth::id(),
            'anuncio_id' => $anuncio,
            'comment' => $request->comment,
            'pdf_name'=> $name,
            'pdf_path'=> $request->file('pdf')->hashName(),
        ]);
        
        return redirect()->back()->with('success', 'Applied!');
    }
    
    public function remove_application($application_id){
        $application = Application::where('id', $application_id)->first();
        $pdf_path = public_path().'/storage/pdf/'. $application->pdf_path; 
        unlink($pdf_path);
        $application->delete();
        return redirect()->back()->with('success', 'Application Removed!');
    }

    public function edit_index($application_id, $anuncio_id){
        $anuncio = Anuncio::where('id', $anuncio_id)->first();
        $anuncio_id = $anuncio->id;
        $application = Application::where('id', $application_id)->first();
        return view('edit_application')->with(compact('application', 'anuncio_id'));
    }

    public function edit_candidatura(Request $request, $anuncio_id){
        $user_id = Auth::user()->id;
        $application = Application::where([['user_id', '=', $user_id], ['anuncio_id', '=', $anuncio_id]])->first();
        if($request->pdf != null){
            $request->validate([
                'pdf' => 'required|mimes:pdf|max:100000',
            ]);

            $pdf_path = public_path().'/storage/pdf/'.$application->pdf_path; 
            unlink($pdf_path);

            $name = $request->file('pdf')->getClientOriginalName();
            $request->file('pdf')->store('public/pdf');

            DB::table('applications')->where('user_id', $user_id)->where('anuncio_id', $anuncio_id)->update([
                'comment' => $request['comment'],
                'pdf_name'=> $name,
                'pdf_path'=> $request->file('pdf')->hashName(),
            ]);
            $application->save();
        }
        else{
            DB::table('applications')->where('user_id', $user_id)->where('anuncio_id', $anuncio_id)->update([
                'comment' => $request['comment'],
            ]);
            $application->save();
        }
        return redirect()->back()->with('success', 'Application successfully edited!');
    }
}
