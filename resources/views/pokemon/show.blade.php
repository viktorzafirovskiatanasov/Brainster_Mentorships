@extends('layout.master')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card w-full">
                <img src="{{ $selectedPokemon->url }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $selectedPokemon->title }}</h5>
                    <p class="card-text">{{ $selectedPokemon->desc }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
