@extends('templates.page')

@section('title', 'Log in')

@section('content')
    <header class="header">

        <div class="header--content page-winners">


            <h1>Winners</h1>


        </div>
        <div class="arrow">
            <span>scroll</span>
            <i class="ion-ios-arrow-down"></i>
        </div>
    </header>



    <main>

        <div id="photos">




        @if(count($winners))

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

        @else

            <h1>no winners avilable</h1>

        @endif

        </div>

    </main>

@stop