<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable = ['user_id', 'body', 'is_approved'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
