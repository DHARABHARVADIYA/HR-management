<?php

// app/Http/Middleware/CheckUserRole.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || !Auth::user()->hasRole($role)) {
            // Return a custom 403 Unauthorized view if the user does not have the role
            return response()->view('unauthorized', [], 403);
        }

        return $next($request);
    }
}
