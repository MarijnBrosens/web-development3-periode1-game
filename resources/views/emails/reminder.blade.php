<h1>winners in {{$period->title}}</h1>
<h3>{{$period->start_date}} --- {{$period->end_date}}</h3>

@foreach($winners as $index => $winner)

    <div style="background-color: #f5f5f5; margin-bottom: 10px; padding: 30px;">

        <h2 style="color:blue;">winner {{$index + 1}}: {{$winner->firstname}} {{ $winner->lastname }}</h2>
        <p>{{$winner->vote_count}} votes</p>
        <p>email: {{$winner->email}}</p>
        <p>address: {{$winner->address}}</p>
        <p>city: {{$winner->zip}} {{$winner->city}}</p>

    </div>

@endforeach
