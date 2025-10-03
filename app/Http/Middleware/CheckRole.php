<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // kalau belum login
        }

        if (!$request->user()->hasRole($role)) {
            abort(403, 'Unauthorized'); // user login tapi bukan role yg diizinkan
        }

        return $next($request);
    }
}
