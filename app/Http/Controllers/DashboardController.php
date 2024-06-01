<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index(Request $request)
    {
        $appointments = auth()->user()
            ->doctor_appointments()
            ->with('pacient')
            ->orderBy('appointment_date')
            ->get();


       $groupAppointments = $appointments->groupBy(function ($appointment , $key) {
            return $appointment->appointment_date->format('D ,M d');
        });

        return view('dashboard.index', compact('groupAppointments'));
    }
}
