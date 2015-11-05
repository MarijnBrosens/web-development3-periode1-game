@extends('templates.page')

@section('title', 'Log in')

@section('content')

    @include('partials.errors')

    <h1><a href="/register">register</a></h1>
    
    <div class="container">
        <form method="POST" action="/login">
            {!! csrf_field() !!}

            <div class="input-group-lines">
                <input type="text" name="email" value="{{ old('email') }}" required autofocus>
                <label>E-mailadres</label>
            </div>

            <div class="input-group-lines">
                <input type="password" name="password" id="password" required>
                <label>Paswoord</label>
            </div>

            <div class="input-group-lines input-group-lines-remember">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
                <input type="submit" value="Aanmelden">
            </div>
        </form>
    </div>

@endsection