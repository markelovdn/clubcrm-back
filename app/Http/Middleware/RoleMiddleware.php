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

        $userRoles = Auth::user()->roles->pluck('code');

        foreach ($userRoles as $role) {
            if (in_array($role, $roles)) {
                return $next($request);
            }
        }

        return response('Forbidden.', 403);
    }
}
