@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">


                @session('message')
                <div class="alert alert-danger">
                <h3>{{$value}}</h3>
                </div>
                @endsession
            </div>
            <div class="col-6 mx-auto position-absolute top-50 start-50 translate-middle">
                <h1 class="text-white"> Welcome to Moj Termin </h1>
            </div>
        </div>
    </div>

@endsection
