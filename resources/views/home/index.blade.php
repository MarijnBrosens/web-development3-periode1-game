@extends('templates.page')

@section('title', 'Home')

@section('content')

    @include('partials.home-header')

    <main>

        @if($period)

            @if(count($photos))

                <h1 class="period-title">{{$period->title}}</h1>

                <div id="photos">

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