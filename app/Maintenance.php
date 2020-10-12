<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['user_id', 'date', 'next_level', 'proof_document', 'is_paid', 'main_merge_balance',
    'maintenance_id', 'charge', 'pending_amount'];


    public function withdrawal()
    {
        return $this->belongsTo('App\Withdrawal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function merges()
    {
        return $this->hasMany('App\Merge');
    }

    public function referral_withdrawal()
    {
        return $this->belongsTo('App\Referral', 'referral_withdrawal_id');
    }
}
