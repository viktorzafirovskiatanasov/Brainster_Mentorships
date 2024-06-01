<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if($request->route()->getName() === 'appointment.create'){
            session()->flash('message' , 'Please login or register to be able to book an appointment');
        }

        return $request->expectsJson() ? null : route('login');
    }
}
