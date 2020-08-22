<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Investor
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
        $user = Auth::user();
        if (Auth::check()) {
            if ($user->is_active()) {
                if(!$user->is_suspended())
                {
                    return $next($request);
                }
                Auth::logout();
                return redirect()->guest('/login')->with('status_err' , 'You have been suspended. Please contact the Admin.');
            }
            return redirect('/activate-account');////When logged in and wanna access a page
        }
        Auth::logout();
        return redirect()->guest('/login')->with('status_err' , 'Oops... Session expired! Please log in.');////When not logged in
    }
}
