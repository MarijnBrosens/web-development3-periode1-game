@extends('templates.page')

@section('title', 'Log in')

@section('content')
    <header class="header">

        <div class="header--content page-winners">

            @if(count($winners))

                @foreach($periods as $period)

                    @if($winners[$period->id])

                        <h1>{{$period->title}}</h1>

                        @foreach($winners[$period->id] as $winner)

                            <p> {{$winner->firstname}} {{$winner->lastname}}</p>
                            <div class="thumb">
                                <img src="img/{{$winner->thumb}}" alt="">
                            </div>

                        @endforeach

                    @endif



                @endforeach

            @else

                <h1>no winners avilable</h1>

            @endif

@stop