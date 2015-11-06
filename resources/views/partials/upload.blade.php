<h1>DROPZONE</h1>

@include('partials/errors');

<div class="animated-form">
    <div class="container">
        {!! Form::open(['route' => 'upload_photo', 'files' => true]) !!}
        {!! csrf_field() !!}

        <div class="input-group-lines">
            {!! Form::text('title') !!}
            {!! Form::label('title', 'Titel') !!}
        </div>

        <div class="input-group-lines">
            {!! Form::text('content') !!}
            {!! Form::label('content', 'content') !!}
        </div>

        <div class="input-group-lines">
            {!! Form::file('image') !!}
            {!! Form::label('image', 'Image') !!}
        </div>

        <div class="input-group-lines">
            {!! Form::submit('Add image') !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>