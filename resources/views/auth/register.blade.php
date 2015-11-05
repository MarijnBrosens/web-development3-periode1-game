@extends('templates.page')

@section('title', 'Registreren')

@section('content')

    @include('partials.errors')

        <h1><a href="/login">login</a></h1>
        <div class="container">
            <form method="POST" action="/register">
                {!! csrf_field() !!}

                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required autofocus>
                    <label for="firstname">Voornaam</label>

                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                    <label for="lastname">Achternaam</label>

                    <input type="text" id="email" name="email" value="{{ old('email') }}" required>
                    <label for="email">E-mailadres</label>

                    <input type="password" id="password" name="password" required>
                    <label for="password">Wachtwoord</label>

                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    <label for="password_confirmation">Herhaal wachtwoord:</label>

                    <input type="text" id="birthday" name="birthday" value="{{ old('birthday') }}" required>
                    <label for="birthday">Geboortedatum</label>

                    <input type="text" id="address" name="address" value="{{ old('address') }}" required>
                    <label for="address">Adres</label>

                    <input type="text" id="zip" name="zip" value="{{ old('zip') }}" required>
                    <label for="zip">Postcode</label>

                    <input type="text" id="city" name="city" value="{{ old('city') }}" required>
                    <label for="city">Plaats</label>

                    <div class="input-group-lines-remember">
                    <input type="submit" value="Registreer">
                </div>
            </form>

        </div>

@endsection