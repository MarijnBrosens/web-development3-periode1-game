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
            <div id="dropzone">
                <div>dropzone</div>
                <input type="file" name="image" accept="image/png, image/jpg, image/gif, image/jpeg" >
        </div>

        <div class="input-group-lines">
            {!! Form::submit('Add image') !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>