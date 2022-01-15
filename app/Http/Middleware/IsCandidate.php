<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsCandidate
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
        if(auth()->user() && auth()->user()->type_user == 'C'){
            return $next($request);
        }
        return redirect('home')->withErrors(['msg'=>"You are not a Candidate."]);
    }
}
