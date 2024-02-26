<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if ($request->user()) {
            if (!$request->user()->hasAnyRole($roles)) {
                abort(403, 'Unauthorized action.');
            }
        }

        return $next($request);
    }
}
