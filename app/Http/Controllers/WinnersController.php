<?php

namespace App\Http\Controllers;

use App\Period;
use App\Photo;
use App\User;
use App\Vote;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WinnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::Past()->orderBy('id','desc')->get();
        $groups[] = '';

        foreach($periods as $p){

            $groups[$p->id] = Photo::WithVotesAndUsers()
                ->groupBy('image')
                ->orderBy('period_id','desc')
                ->orderBy('vote_count','desc')
                ->where('period_id','=',$p->id)
                ->limit(3)
                ->get();
        }

        return view('winners.index', array('winners' => $groups, 'periods' => $periods));

    }

}
