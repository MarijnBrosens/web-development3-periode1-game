<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Period;

class PeriodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::All();

        return view('periods.index', array('periods' => $periods));
    }

    /**
     * return active period
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $period = Period::Active()->firstOrFail();

        return view('periods.active', array('period' => $period));
    }

    /**
     * return future periods
     *
     * @return \Illuminate\Http\Response
     */
    public function future()
    {
        $periods = Period::Future()->get();

        return view('periods.future', array('periods' => $periods));
    }

}
