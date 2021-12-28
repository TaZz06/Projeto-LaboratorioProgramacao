<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pictures = Photo::all();
        return view('home', compact('pictures'));
    }


    public function adminHome()
    {
        return view('adminHome');
    }
}
