<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferralEarning extends Model
{
    protected $fillable = ['user_id', 'amount', 'percentage', 'payer_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payer()
    {
        return $this->belongsTo('App\User', 'payer_id');
    }
}
