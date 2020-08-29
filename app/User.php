<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Passport\HasApiTokens;
use App\Notifications\PasswordReset;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'referral_id', 'guider_id', 'phone', 'support_pin','minimum_investment', 'next_level',
        'maximum_investment', 'referred_by', 'address', 'photo', 'proof_document', 'maintenance_date', 'is_maintained', 'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'guider_id' => 'integer'
    ];

    public function investments()
    {
        return $this->hasMany('App\Investment');
    }

    public function bank()
    {
        return $this->hasOne('App\Bank');
    }

    public function guider()
    {
        return $this->belongsTo('App\User', 'guider_id');
    }

    public function referrer()
    {
        return $this->belongsTo('App\User', 'referred_by', 'referral_id');
    }

    public function referral_earnings()
    {
        return $this->hasMany('App\ReferralEarning');
    }

    public function referral_reward($amount)
    {
        return ($this->referral_earnings->count() < 1  ? (int)$amount * (5/100)  : (int)$amount * (2/100));
    }

    public function guider_reward($amount)
    {
        return ((int)$amount * (2/100));
    }

    public function is_active()
    {
        if((int)$this->is_activated === 1)
        {
            return true;
        }
        return false;
    }

    public function is_suspended()
    {
        if((int)$this->is_blocked === 1)
        {
            return true;
        }
        return false;
    }

    public function is_admin()
    {
        if((int)$this->is_admin === 1)
        {
            return true;
        }
        return false;
    }

    public function referrals()
    {
        return $this->hasMany('App\User','referred_by', 'referral_id');
    }



    //Fetch bank api
    public static function bank_api($account_number, $bank_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=".
                $account_number."&bank_code=".$bank_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_live_4c76c4a7a68a01844c44219118f11ad88fd02870",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response($err, 404);
        } else {
            return $response;
        }
    }

    public function maintenances()
    {
        return $this->hasMany('App\Maintenance');
    }

    public function referral()
    {
        return $this->hasOne('App\Referral');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function testimonies()
    {
        return $this->hasMany('App\Testimony');
    }

    public function sendPasswordResetNotification($token){
        // $this->notify(new MyCustomResetPasswordNotification($token)); <--- remove this, use Mail instead like below

        $data = [
            $this->email
        ];

        Mail::send('email.reset-password', [
            'name'      => $this->name,
            'reset_url'     => route('password.reset', ['token' => $token, 'email' => $this->email]),
        ], function($message) use($data){
            $message->subject('Reset Password Request');
            $message->to($data[0]);
        });
    }
}
