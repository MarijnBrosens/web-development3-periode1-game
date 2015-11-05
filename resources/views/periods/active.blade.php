@extends('templates.page')

@section('title', 'Home')

@section('content')

    <h1>{{$period->title}}</h1>
    <p>started: {{$period->start_date}}</p>
    <p>ends: {{$period->end_date}}</p>

@stop