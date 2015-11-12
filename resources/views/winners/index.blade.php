@extends('templates.page')

@section('title', 'Log in')

@section('content')
    <header class="header">

        <div class="header--content page-winners">

            <div class="logo">
                <img src="img/logo-transparant-yellow.png" alt="logo jack wolfskin">
            </div>
            @if(count($winners))
                <h1>Winners</h1>
            @else
                <h1>No winners available</h1>
            @endif
        </div>

        @if(count($winners))

            <div class="arrow">
                <span>scroll</span>
                <i class="ion-ios-arrow-down"></i>
            </div>

        @endif
    </header>



    <main>
        @if(count($winners))

        <div id="photos">

            <ul id="isotopeGrid" class="grid">


            @foreach($periods as $period)

                @if($winners[$period->id])

                    <section class="clearfix">

                    <h1 class="period-title">{{$period->title}}</h1>

                    @foreach($winners[$period->id] as $winner)

                        <li class="card item">

                            <img src="img/{{$winner->thumb}}" alt="">
                            <div class="overlay"></div>

                            <div class="info">
                                <h3>{{$winner->title}}</h3>
                                <p>{{$winner->firstname}} {{$winner->lastname}}</p>
                            </div>


                        </li>

                    @endforeach

                    </section>

                @endif

            @endforeach

            </ul>

        </div>

        @endif

    </main>

    @if( count($winners) )

        @include('partials.footer')

    @endif

@stop