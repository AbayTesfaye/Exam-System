<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check user role and redirect accordingly
            if ($user->role=='admin') {
                return redirect()->route('users.dashboard');
            }

            return redirect()->route('questions.show');
        }

        return $next($request);
    }
}
