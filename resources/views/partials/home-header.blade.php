
<!--
<section id="slide-3" class="homeSlide">
    <div class="bcg"
         data-center="background-position: 0px 50%;"
         data-bottom-top="background-position: 0px 100%;"
         data-top-bottom="background-position: 0 50%;"
         data-anchor-target="#slide-3"
    >


    </div>
</section>
<div class="header-wrap">
    <img id="test" src="img/testla.jpg" alt="">
</div>
-->



<!--
    We position the images fixed and therefore need to place them outside of #skrollr-body.
    We will then use data-anchor-target to display the correct image matching the current section (.gap element).
-->




<header class="header" id="dragons">

    <div class="content">

        <H1>TAKE A PICTURE OF YOUR OLD CAR AND WIN A BRAND NEW TESLA MODEL X</H1>

        <h1>password123</h1>

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




    </div>

</header>
<div class="gap gap-100" style="background-image:url(img/tesla-2.jpg);"></div>
