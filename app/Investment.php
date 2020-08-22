<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $percentage = 50;

    protected $fillable = [
        'amount', 'reward', 'is_paid', 'withdrawal_date', 'is_withdrawn', 'paid_amount','merge_balance','inv_merge_balance',
        'balance', 'is_recommitted', 'withdrawal_id','referral_withdrawal_id', 'investment_id', 'user_id'
    ];

    public function reward($amount)
    {
        return ((int)$amount + ((int)$amount * $this->percentage/100));
    }

    public function withdrawal()
    {
        return $this->belongsTo('App\Withdrawal');
    }

    public function referral_withdrawal()
    {
        return $this->belongsTo('App\Referral', 'referral_withdrawal_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function merges()
    {
        return $this->hasMany('App\Merge');
    }

    public function withdrawal_merges()
    {
        return $this->hasMany('App\Merge', 'withdrawal_id');
    }

    public function referral_merges()
    {
        return $this->hasMany('App\Merge', 'referral_id');
    }
}
