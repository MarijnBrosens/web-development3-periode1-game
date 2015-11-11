@extends('templates.page')

@section('title', 'Registreren')

@section('content')

    @include('partials.errors')

    <header class="header">

        <div class="header--content page-auth">

            <h1>register</h1>

            <div class="container clearfix">

                <form method="POST" action="/register">
                    {!! csrf_field() !!}

                    <div class="col-1">

                        <div>
                            <label for="firstname">Firstname</label>
                            <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required autofocus/>
                        </div>

                        <div>
                            <label for="lastname">Lastname</label>
                            <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required/>
                        </div>

                        <div>
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" value="{{ old('email') }}" required/>
                        </div>

                        <div>
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}" required/>
                        </div>

                    </div>
                    <div class="col-1">
                        <div>
                            <label for="zip">Zip</label>
                            <input type="text" id="zip" name="zip" value="{{ old('zip') }}" required/>
                        </div>

                        <div>
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}" required/>
                        </div>

                        <div>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required/>
                        </div>

                        <div>
                            <label for="password_confirmation">Repeat password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required/>
                        </div>

                        <div>
                            <input type="submit" value="register">
                        </div>
                    </div>

                </form>

            </div>

            <div class="links">
                <a href="/login">login</a>
            </div>

        </div>
    </header>

@endsection