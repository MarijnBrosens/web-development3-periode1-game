<?php

namespace App\Http\Controllers;


//use Illuminate\Http\Request;
use Carbon\Carbon;
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
     * upload a photo
     *
     * @return \Illuminate\Http\Response
     */
    public function postPhoto(photoRequest $request)
    {
        $period = Period::Active()->firstOrFail();
        $photo = new Photo;

        $input = $request->all();
        $photo->fill($input);

        $photo->slug = str_slug( Input::get( 'title' ), "-" );

        $photo->user_id = Auth::id();
        $photo->period_id  = $period->id;

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

        return redirect()->back();
    }

    /**
     * toggle a vote
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * get partial full or partial photos view
     *
     * @return \Illuminate\Http\Response
     */
    public function getPhotos( $partial )
    {
        $period = Period::Active()->first();
        $pastPeriod = Period::Past()->get();
        $nextPeriod = Period::Future()->first();

        $periods = Period::Past()->orderBy('id','desc')->get();
        $groups = null;

        if(count($periods)){

            foreach($periods as $p){

                $groups[$p->id] = Photo::WithVotesAndUsers()
                    ->groupBy('image')
                    ->orderBy('period_id','desc')
                    ->orderBy('vote_count','desc')
                    ->where('period_id','=',$p->id)
                    ->limit(3)
                    ->get();
            }
        }

        if($period){
            $photos = Photo::WithVotes()->groupBy('photos.id')->where('period_id','=', $period->id)->get();

            if($partial == 1)
            {
                return (String)view('partials.photos', array('photos' => $photos));
            }

            return view('home.index', array('photos' => $photos,'period' => $period,'periods' => $periods,'winners' => $groups,'nextPeriod' => $nextPeriod));
        } else {
            return view('home.index', array('period' => $period,'periods' => $periods,'winners' => $groups,'nextPeriod' => $nextPeriod));
        }
    }
}
