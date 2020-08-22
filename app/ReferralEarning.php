<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferralEarning extends Model
{
    protected $fillable = ['user_id', 'amount', 'percentage'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
