@extends('templates.page')

@section('title', 'Home')

@section('content')

    <header class="header">

        <div class="header--content page-info">

            @if(count($periods))

                @foreach($periods as $period)

                    <h1>{{$period->title}}</h1>
                    <hr>
                    <p>started: {{$period->start_date}}</p>
                    <p>ends: {{$period->end_date}}</p>

                @endforeach

            @else

                <h1>no future periods avilable</h1>

            @endif

            <div class="links">
                <a href="/info">back</a>
            </div>

        </div>

    </header>

@stop