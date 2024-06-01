@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="accordion" id="accordionExample">


            @foreach($appointmentGroups as $date => $group)

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne{{str_replace([' ' , ','] , '_' , $date )}}"
                                aria-expanded="true"
                                aria-controls="collapseOne{{str_replace([' ' , ','] , '_' , $date )}}">
                            {{$date}}
                        </button>
                    </h2>

                    <div id="collapseOne{{str_replace([' ' , ','] , '_' , $date )}}"
                         class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($group as $key => $appointment)

                                <div class="d-flex justify-content-between">
                                    <strong>{{$appointment->appointment_date->format('H:i')}}</strong>
                                    <span>{{ $appointment->pacient->name }} </span>
                                    <span> {{ $appointment->pacient->phone }} </span>
                                    <span></span>{{ $appointment->pacient->email }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{--        <li>--}}
                {{--            Ime: {{ $appointment->pacient->name }}<br/>--}}
                {{--            Kontakt:--}}
                {{--            {{ $appointment->pacient->phone }} {{ $appointment->pacient->email }}<br/>--}}
                {{--            {{ $appointment->appointment_date->format('Y-m-d H:i') }}--}}
                {{--        </li>--}}
            @endforeach
        </div>
    </div>

@endsection
