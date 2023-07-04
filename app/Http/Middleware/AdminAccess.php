<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::user()) {
            return redirect()->route('login');
        }

        if (! Auth::user()->is_admin) {
            abort(403, 'Acesso restrito aos administradores.');
        }
        // return redirect()->route('driver.index');

        return $next($request);
    }
}
