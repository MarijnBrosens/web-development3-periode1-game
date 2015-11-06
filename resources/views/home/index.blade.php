@extends('templates.page')

@section('title', 'Home')

@section('content')

    <h1>ONE PLUS smah your old phone</h1>

    <h1>LARACAST vanaf 14 verder kijken</h1>



    @if(Auth::check())

        @if($period)

            <h1>{{$period->title}} ends <time datetime="{{$period->end_date}}" class="date-h"></time></h1>

            @include('partials/upload')

        @else

            <h3>No active period available</h3>
            @if($nextPeriod)

                <h3>{{$nextPeriod->title}} wil start <time datetime="{{$nextPeriod->start_date}}" class="date-h"></time></h3>

            @endif

        @endif

    @else

        <a class="btn" href="/register">Play</a>

    @endif


    <h1>validatie in controller van request</h1>

    <ul>
        <li>Uitleg over wedstrijd</li>
        <li>Prijzen</li>
        <li>Wie er gewonnen is in een periode</li>
        <li>Call to action</li>
        <li>Lijst met de winnaars van de vorige periodes (automatisch gegenereerd)</li>
        <li>Als je deelneemt, moet je NAW + email gegevens ingeven.</li>
        <li>Hou het IP adres van de deelnemers bij</li>
        <li>Best practices in zaken formulier validatie / security etc...</li>
        <li>Een simpele backend waar je de lijst met de deelnemers kan raadplegen met al hun gegevens en waar je mensen kan diskwalificeren/verwijderen. (soft delete)</li>
        <li>Personaliseer je front-end door tweaks toe te voegen om het geheel eigenheid te geven. Probeer de branding van je gekozen merk wat te integreren</li>
        <li>een winnaar selecteren en op de homepage plaatsen, hiervan wordt ook een mail gestuurd naar de wedstrijd verantwoordelijke.</li>
        <li>betere user check</li>
        <li>betere period check -> als er geen periode is</li>
    </ul>

    @if($period)

        @if(count($photos))

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
@stop