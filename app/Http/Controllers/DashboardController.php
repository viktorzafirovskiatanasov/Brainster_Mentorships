<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index(Request $request)
    {
        $appointments = auth()->user()->doctor_appointments()->with('pacient')->get();


        return view('dashboard.index', compact('appointments'));
    }
}
