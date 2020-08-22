<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merge extends Model
{
    protected $fillable = [
        'investment_id', 'withdrawal_id', 'amount', 'is_paid', 'proof_document', 'referral_id', 'is_resolved', 'is_terminated'
    ];

    protected function user()
    {
        return $this->hasOne('App\User');
    }

    public function withdrawal()
    {
        return $this->belongsTo('App\Investment', 'withdrawal_id');
    }

    public function investor()
    {
        return $this->belongsTo('App\Investment', 'investment_id');
    }

    public function maintenance_investor()
    {
        return $this->belongsTo('App\Maintenance', 'maintenance_id');
    }

    public function referral_withdrawal()
    {
        return $this->belongsTo('App\Referral', 'referral_id');
    }
}
