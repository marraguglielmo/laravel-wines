@extends('layout.main')

@section('content')
    <h1 class="text-center my-5">Wines</h1>

    <div class="container">
        <div class="row row-cols-3">
            @foreach ($wines as $wine)
                <div class="col py-3">
                    <div class="card pt-3 h-100" style="width: 18rem;">
                        <img src="{{ $wine->image }}" class="card-img-top" alt="{{ $wine->name }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $wine->name }}</h3>
                            <h5 class="card-text">{{ $wine->winery }}</h5>
                            <span>voto: {{ $wine->rating_average }}</span>
                            <p>{{ $wine->rating_reviews }}</p>
                            <p class="location">{{ $wine->location }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        {{ $wines->links() }}
    </div>
@endsection
