@extends('templates.page')

@section('title', 'Profile')

@if(count($photos))

    <hr>

    <h1>Jouw Fotos</h1>

    @foreach($photos as $photo)

        <div class="card">

            <img src="img/{{$photo->image}}" alt="{{$photo->title}}">


            <h3>Title: {{$photo->title}}</h3>
            <p>Info: {{$photo->content}}</p>
            <h3>Votes: {{$photo->vote_count}}</h3>

            @if(Auth::check())
                <form method="POST" action="/vote">
                    {!! csrf_field() !!}
                    {!! Form::hidden('photo_id', $photo->id) !!}
                    {!! Form::submit('Vote' , null, [onClick='alert("lol")'] ) !!}
                </form>

                @if($photo->user_voted)
                    <i class="ion-ios-heart"></i>
                @else
                    <i class="ion-ios-heart-outline"></i>
                @endif
            @endif

        </div>

    @endforeach

@eles

    <h1>You have no photos</h1>

@endif