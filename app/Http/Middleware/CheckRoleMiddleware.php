<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request); // Jika admin, lanjutkan permintaan
        }

        // Jika bukan admin, redirect ke halaman lain (misalnya halaman home atau error 403)
        return redirect('/')->with('error', "Anda tidak boleh mengakses ke halaman ini.");
    }
}
