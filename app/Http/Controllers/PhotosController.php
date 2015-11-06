<?php

namespace App\Http\Controllers;


//use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

//use App\Http\Requests;
use App\Http\Requests\photoRequest;
use App\Http\Requests\voteRequest;
use App\Http\Controllers\Controller;

use App\Period;
use App\Photo;
use App\Vote;
use Intervention\Image\Facades\Image;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getPhotos(0);
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

    public function postPhoto(photoRequest $request)
    {
        $period = Period::Active()->firstOrFail();
        $photo = new Photo;

        $input = $request->all();
        $photo->fill($input);

        $photo->slug = str_slug( Input::get( 'title' ), "-" );

        $photo->user_id = Auth::id();
        $photo->period_id  = $period->id;

        //dd($request->file('image'));

        if($request->hasFile('image')) {
            $file           = $request->file('image');
            $fileName       = time() . "-" . strtolower(str_slug($request->input('title'), '-')) . '.' . $file->getClientOriginalExtension();
            $fileNameThumb  = time() . "-" . strtolower(str_slug($request->input('title'), '-')) . '-thumb.' . $file->getClientOriginalExtension();
            $dir            = 'img/uploads/pictures/' . strtolower(str_slug($period->title, '-'));
            $path           = public_path($dir . '/' .  $fileName);
            $pathThumb      = public_path($dir . '/' .  $fileNameThumb);


            if(! \File::isDirectory($dir))
            {
                File::makeDirectory($dir, $mode = 0777, true, true);
            }

            Image::make($file->getRealPath())->resize(768, 576)->save($pathThumb);
            Image::make($file->getRealPath())->resize(2000, null, function($constraint) {
                $constraint->aspectRatio();
            })->save($path);

            $photo->image = 'uploads/pictures/' . strtolower(str_slug($period->title, '-')) . '/' . $fileName;
            $photo->thumb = 'uploads/pictures/' . strtolower(str_slug($period->title, '-')) . '/' . $fileNameThumb;
        }

        $photo->save();

        //Session::flash('flash_message', 'Evenement succesvol toegevoegd.');

        return redirect()->back();
    }

    public function postVote(voteRequest $request)
    {
        $entry = Vote::where('user_id', Auth::user()->id)->where( 'photo_id', (int)$request->input('id') )->first();

        if( $entry )
        {
            if( $entry->voted != 1 ){
                $vote = $entry;
                $vote->voted = 1;

            } else {
                $vote = $entry;
                $vote->voted = 0;
            }
        } else {
            $vote = new Vote;
            $vote->photo_id = (int)$request->input('id');
            $vote->voted = 1;
        }

        $vote->ip = $request->getClientIp();
        $vote->user_id = Auth::user()->id;
        $vote->save();

        return $this->getPhotos(1);
    }

    public function getPhotos( $partial )
    {
        $period = Period::Active()->first();
        $pastPeriod = Period::Past()->get();
        $nextPeriod = Period::Future()->first();

        if($period){
            $photos = Photo::WithVotes()->groupBy('photos.id')->where('period_id','=', $period->id)->get();

            if($partial == 1)
            {
                return (String)view('partials.photos', array('photos' => $photos));
            }

            return view('home.index', array('photos' => $photos,'period' => $period,'pastPeriod' => $pastPeriod,'nextPeriod' => $nextPeriod));
        } else {
            return view('home.index', array('period' => $period,'pastPeriod' => $pastPeriod,'nextPeriod' => $nextPeriod));
        }

/*
        if(Auth::user())
        {
            $query = Photo::leftJoin( 'votes', 'votes.photo_id', '=', 'photos.id' )
                ->select(
                    'photos.*',
                    DB::raw('(SELECT COUNT(voted) FROM votes WHERE voted=1 AND photo_id=photos.id)  AS vote_count'),
                    DB::raw('(SELECT votes.voted FROM votes WHERE photo_id=photos.id AND user_id='.Auth::user()->id.') AS user_voted'),
                    'votes.voted'
                );
        } else {
            $query = Photo::leftJoin( 'votes', 'votes.photo_id', '=', 'photos.id' )
                ->select(
                    'photos.*',
                    DB::raw('(SELECT COUNT(voted) FROM votes WHERE voted=1 AND photo_id=photos.id)  AS vote_count')
                );

        }

            $photos = $query
                ->groupBy('photos.id')
                ->where('period_id','=', $period->id)
                ->get();*/
    }
}
