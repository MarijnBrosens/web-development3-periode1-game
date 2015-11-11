@extends('templates.page')

@section('title', 'Home')

@section('content')

    <header class="header">

        <div class="header--content page-info">

            <h1>game info</h1>
            <hr>
            <p class="game-info">
                Share your best spots.
                the owner of the photo that has the most likes in each period wins a full <a href="http://www.jack-wolfskin.com/search?q=whiteline">whiteline</a> collection.            </p>

            <h1>Active period: {{$period->title}}</h1>
            <hr>
            <p>started: {{$period->start_date}}</p>
            <p>ends: {{$period->end_date}}</p>

            <div class="links">
                <a href="info/periods">ALl periods</a>
                <a href="info/periods/future">Future periods</a>
            </div>

        </div>

    </header>

@stop