<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    //
    protected $fillable = ['user_id','amount','paid_amount','balance','merge_balance','is_withdrawn', 'bonus', 'withdrawal_date'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function investment()
    {
        return $this->hasOne('App\Investment','referral_withdrawal_id');
    }

    public function investor()
    {
        return $this->belongsTo('App\Investment', 'id', 'referral_withdrawal_id');
    }

    public function ref_withdrawal_merges()
    {
        return $this->hasMany('App\Merge', 'referral_id');
    }
}
