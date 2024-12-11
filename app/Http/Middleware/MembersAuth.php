<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class MembersAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has("loggedInMembers")) {
            if (session()->has("loggedInTrainers")) {
                return redirect()->route("dashboard.Trainers");
            } else {
                return redirect()->route("login.Members");
            }
        }

        return $next($request);
    }
}
