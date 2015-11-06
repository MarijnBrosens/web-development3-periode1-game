<!DOCTYPE html>
<html>
<head>
    <title>Game | @yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:800,700,400,300' rel='stylesheet' type='text/css'>

    {!! Html::style('stylesheets/app.css') !!}
    {!! Html::script('javascripts/app.js') !!}
</head>
<body>


@include('partials.nav')
    <div
        class="parallax-image-wrapper parallax-image-wrapper-100"
        data-anchor-target="#dragons + .gap"
        data-bottom-top="transform:translate3d(0px, 200%, 0px); opacity:2;"
        data-top-bottom="transform:translate3d(0px, 0%, 0px); opacity:0;"
    >

        <div
            class="parallax-image parallax-image-100"
            style="background-image:url(img/tesla-2.jpg)"
            data-anchor-target="#dragons + .gap"
            data-bottom-top="transform: translate3d(0px, -80%, 0px); "
            data-top-bottom="transform: translate3d(0px, 80%, 0px); "
        >
        </div>
        <!--the +/-80% translation can be adjusted to control the speed difference of the image-->
    </div>

    <section id="skrollr-body">

        @include('flash::message')

        @yield('content')

        @include('partials.footer')
    </section>

</body>
</html>