<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Period;
use App\Photo;

class EmailController extends Controller
{
    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sendEmailReminder()
    {

        $period = Period::Past()->orderBy('id','desc')->first();


            $periodtitle = $period->title;

            $winners = Photo::WithVotesAndUsers()
                ->groupBy('image')
                ->orderBy('period_id','desc')
                ->orderBy('vote_count','desc')
                ->where('period_id','=', $period->id )
                ->limit(3)
                ->get();

            $data =  ['winners' => $winners, 'periodtitle' => $periodtitle];

            Mail::send('emails.reminder', $data , function ($message) {
                $message->from('winner@webdevelopment.be', 'winners' );
                $message->to('marijnbrosens16@gmail.com')->subject('testmail');
            });


       /* Mail::send('emails.reminder', $data , function ($message) {
            $message->from('winner@webdevelopment.be','wopla');
            $message->to('marijnbrosens16@gmail.com')->subject('testmail');
        });

        return 'mail send';*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
