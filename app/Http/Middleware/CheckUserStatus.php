<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckUserStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->status === 'pending') {
            auth()->logout(); 
            return redirect()->route('login')->with('error', 'Your account is inactive. Please contact the administrator.');
        }

        return $next($request);
    }
}

