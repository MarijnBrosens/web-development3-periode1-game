@extends('templates.page')

@section('title', 'Home')

@section('content')

    <header class="header">

        <div class="header--content page-info">

            <div class="logo">
                <img src="img/logo-transparant-yellow.png" alt="logo jack wolfskin">
            </div>

            <h1>game info</h1>
            <hr>
            <p class="game-info">
                Share your best spots.
                the 3 owners of the most liked photos in each period win a full <a href="http://www.jack-wolfskin.com/search?q=whiteline">whiteline</a> collection.</p>

            @if($period)

                <h1>Active period: {{$period->title}}</h1>
                <hr>
                <p>started: {{$period->start_date}}</p>
                <p>ends: {{$period->end_date}}</p>

            @endif

            <div class="links">
                <a href="info/periods">ALl periods</a>
                <a href="info/periods/future">Future periods</a>
            </div>

        </div>

    </header>

@stop