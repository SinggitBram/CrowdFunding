<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otp_code extends Model
{
    protected $table = 'otp_codes';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
