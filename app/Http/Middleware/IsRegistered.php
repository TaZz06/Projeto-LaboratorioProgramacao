<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsRegistered
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->registered == false){
            if(auth()->user()->type_user == 'C'){
                return response()->view('candidato');
            }
            else if(auth()->user()->type_user == 'E'){
                return response()->view('empresa');
            }
        }
        return response()->view('home');
    }
}