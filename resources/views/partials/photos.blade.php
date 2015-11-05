<div class="grid"  id="isotopeGrid">

@foreach($photos as $photo)

    <li class="card item">

        <img src="img/{{$photo->image}}" alt="{{$photo->title}}">

        <div class="info">

            <h3>Title: {{$photo->title}}</h3>
            <p>Info: {{$photo->content}}</p>
            <h3>Votes: {{$photo->vote_count}}</h3>

            @if(Auth::check())

                <form method="POST" class="ajax" action="/votes" accept-charset="UTF-8">
                    <label for="check-{{$photo->id}}">
                        <input class="check-ajax" type="checkbox" name="check-{{$photo->id}}" id="check-{{$photo->id}}" value="{{$photo->user_voted}}"/>
                        <span>

                            @if($photo->user_voted)
                                <i class="ion-ios-heart"></i>
                            @else
                                <i class="ion-ios-heart-outline"></i>
                            @endif
                            <i class="ion-ios-heart icon-overlay-{{$photo->user_voted}}"></i>

                        </span>
                    </label>
                    {!! csrf_field() !!}
                    {!! Form::hidden('id', $photo->id) !!}
                </form>



            @endif
        </div>

    </li>

@endforeach

</div>


