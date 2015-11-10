<header class="header">

    <div class="header--content">

        <div class="logo">
            <img src="img/logo-transparant-yellow.png" alt="logo jack wolfskin">
        </div>

        @if(Auth::check())

            @if( $period )

                <p>{{$period->title}} ends <time datetime="{{$period->end_date}}" class="date-h"></time></p>

                @include('partials/upload')

            @else

                <h3>No active period available</h3>
                @if( $nextPeriod )

                    <h3>{{$nextPeriod->title}} wil start <time datetime="{{$nextPeriod->start_date}}" class="date-h"></time></h3>

                @endif

            @endif

        @else

            <H1>#SHAREYOURSPOT</H1>
            <a class="btn" href="/register">Share a spot</a>

        @endif


    </div>

    <div class="arrow">
        <span>scroll</span>
        <i class="ion-ios-arrow-down"></i>
    </div>


</header>
<div class="trigger"></div>