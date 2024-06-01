@extends('layouts.app')


@section('content')


<div class="container">
    <div class="row my-5">
        <div class="accordion" id="accordionExample">

            @foreach($groupAppointments as $date => $group)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button
                            class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseOne{{str_replace([' ' , ','] , '_' , $date)}}"
                            aria-expanded="true"
                            aria-controls="collapseOne">
                            {{$date}}
                        </button>
                    </h2>
                    <div
                        id="collapseOne{{str_replace([' ' , ','] , '_' , $date)}}"
                        class="accordion-collapse collapse"
                         aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample"
                    >
                        <div class="accordion-body">

                            @foreach($group as $appointment)
                                <div class="d-flex justify-content-between">
                                    <span>
                                        {{$appointment->appointment_date->format('H:i')}}
                                    </span>
                                    <span>
                                        {{$appointment->pacient->name}}
                                    </span>
                                    <span>
                                        {{$appointment->pacient->phone}}
                                    </span>
                                    <span>
                                        {{$appointment->pacient->email}}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>


@endsection
