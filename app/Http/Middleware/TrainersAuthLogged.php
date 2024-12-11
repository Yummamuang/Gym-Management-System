<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrainersAuthLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has("loggedInTrainers")) {
            return redirect()->route("dashboard.Trainers");
        } else if (session()->has("loggedInMembers")) {
            return redirect()->route("dashboard.Members");
        } else if (session()->has("loggedInAdmin")) {
            return redirect()->route("dashboard.Admin");
        } else {
            return $next($request);
        }

    }
}
