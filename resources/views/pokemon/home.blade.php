@extends('layout.master')

@section('content')
    <div class="container my-5">
        <div class="row">
            @if (isset($pokemons))
                @foreach ($pokemons as $pokemon)
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $pokemon->url }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pokemon->title }}</h5>
                                <a href="{{ route('pokemon.show', ['title' => $pokemon->title]) }}" class="btn btn-outline-dark">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('pokemon.create') }}" class="btn btn-outline-dark mt-5">Make a new pokemon !!!</a>
            @else
                <p>We don't have any pokemons yet. <a href="{{ route('pokemon.create') }}">Would you like to add one?</a></p>
            @endif
        </div>
    </div>
@endsection