<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Otp_code extends Model
{
    protected $table = 'otp_codes';
    protected $guarded = [];

    protected static function boot()
    {
        // parent::boot(); kl ga jalan
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
