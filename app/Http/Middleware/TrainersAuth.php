<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;
class TrainersAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has("loggedInTrainers")) {
            if (session()->has("loggedInMembers")) {
                return redirect()->route("dashboard.Members");
            } else {
                return redirect()->route("login.Trainers");
            }
        }
        return $next($request);
    }
}
