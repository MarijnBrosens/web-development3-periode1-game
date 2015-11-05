<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Photo extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'period_id',
        'image',
        'thumb',
        'content'
    ];


    public function scopeWithVotes($query)
    {
        if(Auth::user())
        {
            $query->leftJoin( 'votes', 'votes.photo_id', '=', 'photos.id' )
                ->select(
                    'photos.*',
                    DB::raw('(SELECT COUNT(voted) FROM votes WHERE voted=1 AND photo_id=photos.id)  AS vote_count'),
                    DB::raw('(SELECT votes.voted FROM votes WHERE photo_id=photos.id AND user_id='.Auth::user()->id.') AS user_voted'),
                    'votes.voted'
                );
        } else {
            $query->leftJoin( 'votes', 'votes.photo_id', '=', 'photos.id' )
                ->select(
                    'photos.*',
                    DB::raw('(SELECT COUNT(voted) FROM votes WHERE voted=1 AND photo_id=photos.id)  AS vote_count')
                );
        }
    }




    public function period()
    {
        return $this->belongsTo('App\Period');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function votes(){
        return $this->hasMany('App\Vote');
    }
}
