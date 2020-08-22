<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class InvestorActivated
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
            if (!$user->is_active()) {
                return $next($request);
            }
            return redirect('/investments');////When logged in and wanna access a page
        }
    }
}
