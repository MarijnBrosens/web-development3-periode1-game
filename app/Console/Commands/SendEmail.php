<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use Carbon\Carbon;
use App\Period;
use App\Photo;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send e-mail to a admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $period = Period::Past()->orderBy('id','desc')->first();
        $perioddate = Carbon::parse($period->end_date);


        if( ( Carbon::now() >= $perioddate ) && ( Carbon::now() <= $perioddate->addMinute() ) )
        {
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
                $message->to('marijnbrosens16@gmail.com')->subject('winnaars bekend');
            });

        }

    }
}