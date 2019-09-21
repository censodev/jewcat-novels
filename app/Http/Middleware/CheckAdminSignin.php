<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminSignin
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
        if(!Auth::check()) return redirect()->intended('/admin/signin');
        else if(Auth::user()->role == 1) {
            Auth::logout();
            return redirect()->intended('/admin/signin');
        }
        else return $next($request);
    }
}
