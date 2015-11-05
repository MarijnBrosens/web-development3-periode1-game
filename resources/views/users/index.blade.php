@extends('templates.page')

@section('title', 'Log in')

@section('content')

    <table>

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
                    {!! Form::open(array('url' => 'users/delete')) !!}
                    {!! csrf_field() !!}
                    {!! Form::hidden('id',$user->id) !!}
                    {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach

    </table>

@stop