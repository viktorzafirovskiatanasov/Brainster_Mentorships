@extends('layouts.app')


@section('content')
    <ul>
    @foreach($appointments as $appointment)
        <li>
            Ime: {{ $appointment->pacient->name }}<br/>
            Kontakt:
            {{ $appointment->pacient->phone }} {{ $appointment->pacient->email }}<br/>
            {{ $appointment->appointment_date->format('Y-m-d H:i') }}
        </li>
    @endforeach
    </ul>
@endsection
