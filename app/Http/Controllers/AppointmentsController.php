<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

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
//  $dates = [];
//
//  $range = range(9 , 16);
//
//  $startDate = now()->addDay()->format('Y-m-d');
//
//
//  foreach ($range as $hour) {
//      $dates[] = $startDate . " " . $hour . ":00";
//  }
Carbon::create();
        $dates = CarbonPeriod::create(
            now()->addDay()->format('Y-m-d 09:00:00'),
            '1 hour',
            now()->addDay()->format('Y-m-d 16:00:00'),
        );

//TODO: check for existing dates
        return view('appointments.create' , compact('dates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'appointment_date' => 'required|unique:appointments,appointment_date'
        ]);

        $appointmentCreated = Appointment::create([
           'user_id' => User::first()->id, // doctor
           'name'=> $request->input('name'),
           'email'=> $request->input('email'),
           'phone'=> $request->input('phone'),
           'appointment_date'=> $request->input('appointment_date'),
        ]);





        return redirect()->route('homepage')
            ->with('message' , 'You\'re booked in for '. $appointmentCreated->appointment_date->format('F j, Y, H:i a') .'. Thank you!');
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

