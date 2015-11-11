<div class="grid"  id="isotopeGrid">

@foreach($photos as $photo)

    <li class="card item">

        <img src="img/{{$photo->thumb}}" alt="{{$photo->title}}">

        <div class="overlay"></div>
        <div class="info">
            <h3>{{$photo->title}}</h3>
            <p>{{$photo->content}}</p>
        </div>

        <div class="like">
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
                            <p class="vote-count">{{$photo->vote_count}}</p>

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


