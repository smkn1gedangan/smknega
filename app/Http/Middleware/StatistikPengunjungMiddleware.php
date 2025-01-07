<?php

namespace App\Http\Middleware;

use App\Models\StatistikPengunjung as ModelsStatistikPengunjung;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatistikPengunjungMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
        {
            $exists = ModelsStatistikPengunjung::where('ip_address', $request->ip())
            ->where('user_agent', $request->userAgent())
            ->whereDate('visited_at', now()->toDateString()) // Membatasi hanya untuk hari ini
            ->exists();

        if (!$exists) {
            ModelsStatistikPengunjung::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'visited_at' => now(),
            ]);
        }


        return $next($request);
    }
}
