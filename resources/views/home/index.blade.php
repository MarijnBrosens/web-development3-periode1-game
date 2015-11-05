@extends('templates.page')

@section('title', 'Home')

@section('content')

    <h1>LARACAST vanaf 14 verder kijken</h1>

    @if(Auth::check())


        <h1>{{$period->title}} ends <time datetime="{{$period->end_date}}" class="counter"></time></h1>
        <time datetime="{{$period->end_date}}" class="end-date"></time>


        <time datetime="{{$period->end_date}}" class="countdown end-date"></time>

        <h1>DROPZONE</h1>

        @include('partials/errors');

        <div class="animated-form">
            <div class="container">
                {!! Form::open(['route' => 'upload_photo', 'files' => true]) !!}
                {!! csrf_field() !!}

                <div class="input-group-lines">
                    {!! Form::text('title') !!}
                    {!! Form::label('title', 'Titel') !!}
                </div>

                <div class="input-group-lines">
                    {!! Form::text('content') !!}
                    {!! Form::label('content', 'content') !!}
                </div>

                <div class="input-group-lines">
                    {!! Form::file('image') !!}
                    {!! Form::label('image', 'Image') !!}
                </div>

                <div class="input-group-lines">
                    {!! Form::submit('Add image') !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    @else

        <a class="btn" href="/register">Play</a>

    @endif

    <h1>periode counter : periode expires in 3days and 30 minutes</h1>
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

    @if(count($photos))

        <div id="photos">
            @include('partials/photos')
        </div>

    @endif

@stop