@extends('layout.main')

@section('content')

<div class="container py-5 ">
    <h2>{{ $wine->name }}</h2>

</div>
<div class="container my-3 d-flex">

    <div class="container w-25">

        <img src="{{$wine->image}}" alt="">

    </div>
    <div class="container">

        <p><i class="fa-solid fa-location-dot"></i> Posizione: {{$wine->location}}</p>
        <p>Enoteca: {{$wine->winery}}</p>
        <p>Voto: {{$wine->rating_average}}</p>
        <p>Recensioni totali: {{$wine->rating_reviews}}</p>
    </div>





</div>



@endsection
