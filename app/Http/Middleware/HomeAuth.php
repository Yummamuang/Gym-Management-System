<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeAuth
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
        }

        if (session()->has("loggedInMembers")) {
            return redirect()->route("dashboard.Members");
        }
        return $next($request);
    }
}
