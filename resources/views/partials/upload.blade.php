@include('partials/errors')

<div class="dropzone-wrapper">

        {!! Form::open(['route' => 'upload_photo', 'files' => true]) !!}
        {!! csrf_field() !!}

        <div>
            <div id="dropzone">
                <div><h2><i class="ion-ios-camera-outline"></i></h2></div>
                <input type="file" name="image" accept="image/png, image/jpg, image/gif, image/jpeg" >
        </div>

        <div class="image-info">

            <div>
                {!! Form::label('title', 'Titel') !!}
                {!! Form::text('title') !!}
            </div>

            <div>
                {!! Form::label('content', 'Content') !!}
                {!! Form::text('content') !!}
            </div>

            <div>
                {!! Form::submit('Upload') !!}
            </div>

        </div>

        {!! Form::close() !!}
    </div>
</div>