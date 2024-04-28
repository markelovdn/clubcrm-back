<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return response('Unauthorized.', 401);
        }

        $userRole = Auth::user()->roles->first()->code;

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        return response('Forbidden.', 403);
    }
}
