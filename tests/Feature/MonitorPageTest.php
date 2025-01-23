<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class MonitorPageTest extends TestCase
{
    /**
     * Test sending error to Telegram on 500 error.
     */
    public function test_sends_error_to_telegram_on_500_error()
    {
        // Mock HTTP request ke Telegram
        Http::fake([
            'https://api.telegram.org/bot' . config('services.telegram.bot_token') . '/sendMessage' => Http::response([], 200),
        ]);


        // Mock route untuk memicu 500 error
        $this->app['router']->get('/', function () {
            abort(500, 'Simulated Server Error');
        });

        // Kirim request ke halaman /
        $response = $this->get('/');

        // Pastikan status 500
        $response->assertStatus(500);

        // Periksa apakah HTTP request ke Telegram dikirim
        Http::assertSent(function ($request) {
            return $request->url() === "https://api.telegram.org/bot" . env('TELEGRAM_TOKEN') . "/sendMessage" &&
                $request['chat_id'] === env('TELEGRAM_CHAT_ID') &&
                str_contains($request['text'], "Error Terdeteksi");
        });

        // Assert the response status
        $response->assertStatus(200);
    }
}
