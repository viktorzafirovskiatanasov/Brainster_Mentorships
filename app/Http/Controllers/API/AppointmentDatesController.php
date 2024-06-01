<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class AppointmentDatesController extends Controller
{
    public function available_times(Request $request)
    {

        $from = Carbon::parse($request->date)->format('Y-m-d 09:00:00');
        $to = Carbon::parse($request->date)->format('Y-m-d 16:00:00');

        $generatedPeriod = CarbonPeriod::create($from, '1 hour', $to);

        $existingAppointments = Appointment::query()->whereBetween(
            'appointment_date',
            [$from, $to]
        )
            ->get();

        $availableDates = [];

        foreach ($generatedPeriod as $date) {
            if( ! $existingAppointments->where('appointment_date' , $date->format('Y-m-d H:00:00'))->first()){
                $availableDates[$date->format('Y-m-d H:00:00')] = $date->format('H:00');
            }
        }

        return response()->json(
          $availableDates
        );

    }
}
