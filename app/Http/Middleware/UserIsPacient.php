<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserIsPacient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //middleware logic

        if($request->user()->type !== 'patient') {
            return redirect('/')
                ->with('message' , 'You don’t have access to this page');
        }


        return $next($request);
    }
}
