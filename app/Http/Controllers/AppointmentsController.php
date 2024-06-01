<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        [$from, $to] = [now()->addDay()->format('Y-m-d 09:00:00'), now()->addDay()->format('Y-m-d 16:00:00')];
        $dates = CarbonPeriod::create(
            $from,
            '1 hour',
            $to
        );
        $userAppointments = auth()->user()
            ->pacient_appointments()
            ->select('appointment_date')
            ->whereBetween('appointment_date', [$from, $to])
            ->get();

        $userDates = [];

//        $userAppointments->each(function ($appointment) use (&$userDates) {
//            $userDates[] = $appointment->appointment_date->format('d.M.Y H:i');
//        });
        foreach ($userAppointments as $appointment) {
            $userDates[] = $appointment->appointment_date->format('d.M.Y H:i');
        }
        if ($userAppointments->isNotEmpty()) {
            session()->flash('message', "You have already booked appointments for " . implode('|', $userDates));
        }


        return view('appointments.create', compact('dates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
//            'name' => 'required|max:255',
//            'phone' => 'required',
//            'email' => 'required|email',
            'appointment_date' => 'required|unique:appointments,appointment_date'
        ]);

        $appointmentCreated = Appointment::create([
            'user_id' => User::first()->id, // doctor
            'patient_id' => $request->user()->id, // auth()->user()->id || Auth::user()->id || Auth::id() || session()->user()->id
            'appointment_date' => $request->input('appointment_date'),
        ]);

        return redirect()->route('homepage')
            ->with('message', 'You\'re booked in for ' . $appointmentCreated->appointment_date->format('F j, Y, H:i a') . '. Thank you!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

