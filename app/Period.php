<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'periods';

    protected $fillable = [
        'start_date',
        'end_date'
    ];

    public $timestamps = false;

    public function scopeActive($query)
    {
        $query->where('start_date' , '<' , Carbon::now() )->where('end_date' , '>' , Carbon::now() );
    }

    public function scopePast($query)
    {
        $query->where('end_date' , '<' , Carbon::now() );
    }

    public function scopeFuture($query)
    {
        $query->where('start_date' , '>' , Carbon::now() );
    }

    public function photos(){
        return $this->hasMany('App\Photo');
    }
}
