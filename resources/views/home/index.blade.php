@extends('templates.page')

@section('title', 'Home')

@section('content')

    @include('partials.home-header')

    <main>

        @if($period)

            @if(count($photos))

                <div id="photos">

                    <h1>{{$period->title}}</h1>

                    @include('partials/photos')

                </div>

            @endif

        @endif

        @if($pastPeriod)

            <h1>Past periods</h1>

            @foreach($pastPeriod as $period)

                <h1>{{$period->title}}</h1>
                <p>started: {{$period->start_date}}</p>
                <p>ends: {{$period->end_date}}</p>

            @endforeach

        @endif

    </main>

@stop