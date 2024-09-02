<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InstructorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->hasRole('Instructor')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
