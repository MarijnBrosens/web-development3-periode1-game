@extends('templates.page')

@section('title', 'Log in')

@section('content')

    @include('partials.errors')

    <header class="header">

        <div class="header--content page-auth">

            <h1>login</h1>

            <form method="POST" action="/login">
                {!! csrf_field() !!}

                <div>
                    <label>E-mailadres</label>
                    <input type="text" name="email" value="{{ old('email') }}" required autofocus/>
                </div>

                <div>
                    <label>Paswoord</label>
                    <input type="password" name="password" id="password" required/>
                </div>

                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label class="remember-label" for="remember">Remember Me</label>
                    <input type="submit" value="Aanmelden"/>
                </div>
            </form>

            <div class="links">
                <a href="/register">register</a>
            </div>


        </div>

    </header>

@stop