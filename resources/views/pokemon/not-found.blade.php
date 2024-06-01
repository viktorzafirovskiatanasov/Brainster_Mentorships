@extends('layout.master')
@section('content')
    <div class="bg-light">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="card-title">Pokemon Not Found</h1>
                            <p class="card-text">The Pokemon you are looking for does not exist.</p>
                            <a href="{{ route('pokemon.home') }}" class="btn btn-outline-dark">Go Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
