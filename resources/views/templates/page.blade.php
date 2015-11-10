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

    @include('flash::message')

    @yield('content')

    @include('partials.footer')

</body>
</html>