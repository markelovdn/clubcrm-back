<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AnyRoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return response('Unauthorized.', 401);
        }

        $userRole = Auth::user()->roles;

        if (count($userRole) >= 1) {
            return $next($request);
        }

        return response('Forbidden.', 403);
    }
}
