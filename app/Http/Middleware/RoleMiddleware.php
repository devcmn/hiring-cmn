<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $userRole = Auth::user()->role;

        // Admin bypasses role restrictions
        if ($userRole !== 'admin' && !in_array($userRole, $roles)) {
            return redirect('/')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
