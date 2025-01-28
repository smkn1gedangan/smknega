<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class MonitorPageErrors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        if ($response->getStatusCode() === 404 || $response->getStatusCode() === 500) {
            $content = $response->getStatusCode() === 404 ? "not found" : "server error";
            $params = [
                'chat_id' => config("services.telegram.chat_id"),
                'text' => "Error Terdeteksi\n"." url = " . $request->fullUrl() ."\n".
                "status_code = ". $response->getStatusCode(). "\n" .
                "content = " . $content. "\n".
                "waktu = " .now()
            ];
            $url = "https://api.telegram.org/bot" . config("services.telegram.bot_token") . "/sendMessage";
            $response = Http::post($url, $params);

            if ($response->successful()) {
                Log::info("Error halaman terkirim");
            } else {
                Log::error("Error Halaman: " . $response->body());
            }
        }
        return $next($request);
    }
}
