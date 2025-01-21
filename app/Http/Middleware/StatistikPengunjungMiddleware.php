<?php

namespace App\Http\Middleware;

use App\Models\StatistikPengunjung as ModelsStatistikPengunjung;
use Carbon\Carbon;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
            $userAgent = $request->header('User-Agent');

            // Tolak jika User-Agent kosong
            if (!$userAgent || str_contains($userAgent, 'bot')) {
                abort(429, 'Too Many Requests');
            }
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
        $visitorCount = ModelsStatistikPengunjung::count();
        if ($visitorCount > 0 && $visitorCount % 100 == 0) {
            $url = "https://api.telegram.org/bot" . env("TELEGRAM_TOKEN") . "/sendMessage";
            $params = [
                'chat_id' => env("TELEGRAM_CHAT_ID"),
                'text' => "Website SMKN 1 Gedangan telah dikunjungi sebanyak " . $visitorCount . " kali pada " . Carbon::now(),
            ];

            $response = Http::post($url, $params);

            if ($response->successful()) {
                Log::info("Akses ke $visitorCount dikirim ke Telegram");
            } else {
                Log::error("Error Middleware Visitor count: " . $response->body());
            }
        }
        return $next($request);
    }
}
