<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['reportee_id','reporter_id', 'message'];

    public function reporter()
    {
        return $this->belongsTo('App\User', 'reporter_id');
    }

    public function reportee()
    {
        return $this->belongsTo('App\User', 'reportee_id');
    }
}
