<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index(Request $request)
    {

        $appointments = auth()->user()->doctor_appointments()->with('pacient')
            ->orderBy('appointment_date')
            ->get();

        $appointmentGroups =  $appointments->groupBy(function ( $appointment, int $key) {
            return $appointment->appointment_date->format('l, F j');
        });

        return view('dashboard.index', compact('appointmentGroups'));
    }
}
