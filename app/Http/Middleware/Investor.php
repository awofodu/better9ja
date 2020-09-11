<?php

namespace App\Http\Middleware;

use App\Investment;
use App\User;
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
        $investment = Investment::where('is_paid', 1)->latest()->first();
        $admin = collect(User::where('is_admin', 1)->with('bank')->get())->shuffle()->first();
        if (Auth::check()) {
            if ($user->is_active()) {
                if(!$user->is_suspended())
                {
                    return $next($request);
                }
                Auth::logout();
                return redirect()->guest('/login')->with('status_err' ,
                    'You have been suspended and you are mandated to pay a sum of <b>₦'.number_format($investment ? ($investment->amount * (30/100)) : 2000).
                    '</b> to the account number below: <br><br>'.
                    '<b>Bank Name: '.$admin->bank->bank_name.'</b><br>'.
                    '<b>Account Name: '.$admin->bank->account_name.'</b><br>'.
                    '<b>Account Number: '.$admin->bank->account_number.'</b><br>'.
                    '<b>Phone Number: '.$admin->phone.'</b><br><br>'.
                    'Contact the investor after you have made your payment.'
                );
            }
            return redirect('/activate-account');////When logged in and wanna access a page
        }
        Auth::logout();
        return redirect()->guest('/login')->with('status_err' , 'Oops... Session expired! Please log in.');////When not logged in
    }
}
