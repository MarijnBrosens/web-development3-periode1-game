<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'ip',
        'user_id',
        'photo_id',
        'voted'
    ];

    public function user()
    {
        return $this->belongsTo('App\Photo');
    }
}
