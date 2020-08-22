<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['user_id', 'account_name', 'account_number', 'bank_name', 'bank_code'];
}
