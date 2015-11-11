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

            @if(count($winners))

                <h1 class="period-title">Winners</h1>

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

    </main>

@stop