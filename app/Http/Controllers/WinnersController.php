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
        //dd($photo[0]['id']);

        $periods = Period::All();

        foreach($periods as $p){

            $groups[$p->id] = Photo::WithVotesAndUsers()
                ->groupBy('image')
                ->orderBy('period_id','desc')
                ->orderBy('vote_count','desc')
                ->where('period_id','=',$p->id)
                ->limit(3)
                ->get();
        }


        //dd(Photo::WithVotes()->get()->groupBy('period_id'));

        /*dd(Photo::with('votes')
            ->join('users', 'photos.user_id', '=', 'users.id')
            //->select('users.firstname', 'photos.*')
            ->get()->sortByDesc(function($query) {
                return $query->votes->count();
            })->groupBy('period_id'));

        $votes = User::join('photos','photos.user_id','=','users.id')
            ->join( 'votes', 'votes.photo_id', '=', 'photos.id' )
            ->join( 'periods', 'periods.id', '=','photos.period_id')
            ->select(
                'photos.period_id',
                'users.*',
                DB::raw('(SELECT COUNT(voted) FROM votes WHERE voted=1 AND photo_id=photos.id)  AS vote_count')
            )
            ->where('end_date','<',Carbon::now())
            ->orderBy('vote_count','desc')
            ->get();*/

        //dd($votes);

        return view('winners.index', array('winners' => $groups, 'periods' => $periods));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
