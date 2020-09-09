<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Maintenance;
use App\Providers\RouteServiceProvider;
use App\Referral;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|numeric',
            'terms_and_policy' => 'accepted',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//            'phone' => $data['phone'],
//            'referral_id' => strtoupper(Str::random(6)),
//            'support_pin' => rand(1000, 9999),
////            'guider_id' => rand(1,2);
//        ]);
//    }

    public function register(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);
        if($validator->passes())
        {
            $admin = collect(User::where('is_admin', 1)->with('bank')->get())->shuffle()->first();
            if($ref_id = $request->referred_by)
            {
                $referrer = User::where('referral_id', $ref_id)->first();
                $input['referred_by'] = $referrer->referral_id;
                $input['guider_id'] = (int)$referrer->is_guider === 1 ? $referrer->id : $admin->id;

            }else{
                $input['guider_id'] = $admin->id;
            }

            $input['password'] = Hash::make($request->password);
            $input['referral_id'] = strtoupper(Str::random(6));
            $input['support_pin'] = rand(1000, 9999);

            $user = User::create($input);
            Maintenance::create(['user_id'=>$user->id, 'maintenance_id'=>strtoupper(Str::random(6))]);
            Referral::create(['user_id'=>$user->id, 'referral_id'=>strtoupper(Str::random(6))]);

            $user->sendEmailVerificationNotification();

            return redirect('/login')->with('status_suc' , 'Resgistration successful. Proceed to login.');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function referrer($referral_link)
    {
        $user = User::whereReferralId($referral_link)->first();
        if($user)
        {
            $referral_id = $user->referral_id;
            return view('auth.register', compact('referral_id'));
//            return redirect('/register')->with('referred_by', $user->referral_id);
        }
        return redirect('register');
    }
}
