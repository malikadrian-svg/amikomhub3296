<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Posisikan logika di dalamnya agar menghalangi user yang kebetulan Role-nya bukan "admin"
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Anda bukan admin.');
        }

        return $next($request);
    }
}
