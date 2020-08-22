<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::check()) {
            if (Auth::user()->is_admin()) {
                return $next($request);
            }
        }
//        Auth::logout();
        return redirect()->guest('/investments')->with('status_err', 'Oops... Session expired! Please log in.');////When not logged in
    }
}
