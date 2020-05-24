<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Adminware
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
        if(Auth::check()){
            if(count(Auth::user()->roles) > 0 && Auth::user()->roles->pluck("id")[0] === 1){
                return $next($request);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/login');
        }
    }
}
