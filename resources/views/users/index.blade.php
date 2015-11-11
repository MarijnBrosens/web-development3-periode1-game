@extends('templates.page')

@section('title', 'Log in')

@section('content')
    <header class="header">

        <div class="header--content page-info">

            <div class="logo">
                <img src="../img/logo-transparant-yellow.png" alt="logo jack wolfskin">
            </div>

            <table>

                <tr>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>email</th>
                    <th>address</th>
                    <th>zip</th>
                    <th>city</th>
                    <th>ip</th>
                </tr>

                @foreach($users as $user)

                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->zip}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->ip}}</td>
                        <td>
                            {!! Form::open(array('url' => 'admin/users/delete', 'method' => 'delete')) !!}
                            {!! csrf_field() !!}
                            {!! Form::hidden('id',$user->id) !!}
                            {!! Form::submit('Delete') !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach

            </table>

            {!! $users->render() !!}

        </div>

    </header>

@stop