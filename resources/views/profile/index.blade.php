@extends('templates.page')

@section('title', 'Profile')

@section('content')

    <header class="header">

        <div class="header--content">
            <div class="logo">
                <img src="img/logo-transparant-yellow.png" alt="logo jack wolfskin">
            </div>
            <h1>{{$user->firstname}} {{$user->lastname}}</h1>
            <p>{{$user->email}}</p>
            <p>{{$user->address}} - {{$user->zip}} {{$user->city}}</p>
        </div>

        @if(count($photos))

            <div class="arrow">
                <span>scroll</span>
                <i class="ion-ios-arrow-down"></i>
            </div>

        @endif

    </header>

    <main>

        @if(count($photos))

            <h1 class="period-title">my photos</h1>

            <div id="photos">

                <div class="grid"  id="isotopeGrid">

                    @foreach($photos as $photo)

                        <li class="card item">

                            <img src="img/{{$photo->thumb}}" alt="{{$photo->title}}">

                            <div class="overlay"></div>
                            <div class="info">
                                <h3>{{$photo->title}}</h3>
                                <p>{{$photo->content}}</p>
                            </div>

                        </li>

                    @endforeach

                </div>

            </div>

        @endif

    </main>

    @if(count($photos))

        @include('partials.footer')

    @endif

@stop