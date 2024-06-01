@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto position-absolute top-50 start-50 translate-middle">
                <form enctype="multipart/form-data" method="POST" action="{{route('appointment.store')}}"
                      class="rounded bg-secondary-subtle p-3">
                    @csrf
                    {{--                    <div class="mb-3">--}}
                    {{--                        <label for="name" class="form-label">Name</label>--}}
                    {{--                        <input class="form-control form-control-sm" type="text" name="name" id="name">--}}
                    {{--                    </div>--}}
                    {{--                    <div class="mb-3">--}}
                    {{--                        <label for="email" class="form-label">Email</label>--}}
                    {{--                        <input class="form-control form-control-sm" type="email" name="email" id="email">--}}
                    {{--                    </div>--}}
                    {{--                    <div class="mb-3">--}}
                    {{--                        <label for="phone" class="form-label">Phone</label>--}}
                    {{--                        <input class="form-control form-control-sm" type="tel" name="phone" id="phone">--}}
                    {{--                    </div>--}}

                    <div class="mb-3">
                        <label class="form-label">Choose Date</label>
                        <div class="form-control form-control-sm" id="date-picker"></div>

                    </div>
                    <div class="mb-3">
                        <label for="appointment_date" class="form-label">Appointment Date</label>
                        <select class="form-control form-control-sm" name="appointment_date" id="appointment_date">
{{--                            @for($i = 0;$i < 3;$i++)--}}
{{--                                @foreach($dates as $date)--}}
{{--                                    @php--}}
{{--                                        $date->addDays($i);--}}
{{--                                    @endphp--}}
{{--                                    <option value="{{$date}}"> {{$date->format('H:i M d')}}</option>--}}
{{--                                @endforeach--}}
{{--                            @endfor--}}
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <script>

        $(() => {

            $('#date-picker').datepicker({
                daysOfWeekDisabled: '0,6',
                startDate: new Date(),
                endDate: '+1M',
                format: 'yyyy-m-d',
                onSelect : (date) => {
                    getAvailbleTimes(date)
                }

            })

            let date = $('#date-picker').datepicker('getDate')


            getAvailbleTimes(`${date.getFullYear()}-${date.getMonth()}-${date.getDay()}`)

            function getAvailbleTimes(date) {
                $.ajax('/api/available-times', {
                    method: "GET",
                    data: {
                        date: date
                    }
                })
                    .then(res => {
                        $('#appointment_date').empty()
                        if (!Object.keys(res).length) {
                            $('#appointment_date').append("<option value=''>No available Times</option>")
                        } else {

                            let options = "";
                            $.each(res, function (datetime, time) {
                                options += `<option value='${datetime}'>${time}</option>`
                            })

                            $('#appointment_date').append(options)
                        }

                    })
            }








        })



    </script>
@endsection
