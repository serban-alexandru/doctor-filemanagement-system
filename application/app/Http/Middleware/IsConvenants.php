<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsConvenants
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role_id == 3){
            return $next($request);
        }
        return redirect()->back()->with('error', 'You are not an admin');    
    }
}
