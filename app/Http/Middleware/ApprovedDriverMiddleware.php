<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApprovedDriverMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !auth()->user()->canRequestFuel()) {
            return redirect()->route('driver.dashboard')
                ->with('error', 'You must be approved and have an approved vehicle to request fuel.');
        }

        return $next($request);
    }
}
