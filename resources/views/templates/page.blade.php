<!DOCTYPE html>
<html>
<head>
    <title>Game | @yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:800,700,400,300' rel='stylesheet' type='text/css'>

    {!! Html::style('stylesheets/app.css') !!}
    {!! Html::script('javascripts/app.js') !!}
</head>
<body>

    <header>
        @include('partials.nav')
    </header>

    <main>
        <h1>password123</h1>

        @include('flash::message')
        @yield('content')
    </main>

    <footer>
        @include('partials.footer')
    </footer>

</body>
</html>