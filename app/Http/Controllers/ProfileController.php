<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user())
        {

            $userVotes = Auth::user()->votes()->where('voted','=',1)->get()->toArray(); // foto's waarop ik gevote heb

            $photos = Photo::leftJoin( 'votes', 'votes.photo_id', '=', 'photos.id' )
                ->select(
                    'photos.*',
                    DB::raw('(SELECT COUNT(voted) FROM votes WHERE voted=1 AND photo_id=photos.id)  AS vote_count'),
                    DB::raw('(SELECT votes.voted FROM votes WHERE photo_id=photos.id AND user_id='.Auth::user()->id.') AS user_voted'),
                    'votes.voted'
                )
                ->where('photos.user_id' , '=' ,Auth::user()->id)
                ->groupBy('photos.id')
                ->get();

            return view('home.index', array('photos' => $photos));
        }
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
