<?php

namespace Tests\Feature;

use App\Http\Middleware\StatistikPengunjungMiddleware;
use App\Models\StatistikPengunjung;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class TelegramApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Define a test route to apply middleware
        Route::get('/', function () {
            return response('Middleware Test Passed');
        })->middleware(StatistikPengunjungMiddleware::class);
    }
    public function test_new_visitor_is_logged()
    {
        // Fake the HTTP client for Telegram API
        Http::fake();

        // Simulate a request
        $response = $this->get('/', [
            'User-Agent' => 'TestUserAgent',
        ]);

        // Assert the response status
        $response->assertStatus(200);

        // Assert the visitor is logged in the database
        $this->assertDatabaseHas('statistik_pengunjungs', [
            'ip_address' => '127.0.0.1', // Default IP in testing
            'user_agent' => 'TestUserAgent',
        ]);
    }

    public function test_no_duplicate_logging_within_same_day()
    {
        // Create an existing record
        StatistikPengunjung::create([
            'ip_address' => '127.0.0.1',
            'user_agent' => 'TestUserAgent',
            'visited_at' => now(),
        ]);

        // Simulate a request
        $response = $this->get('/', [
            'User-Agent' => 'TestUserAgent',
        ]);

        // Assert no duplicate record was created
        $this->assertEquals(1, StatistikPengunjung::count());
    }

    public function test_sends_telegram_message_on_visitor_milestone()
    {
        // Fake the HTTP client for Telegram API
        Http::fake();

        // Seed the database with 99 visitors
        for ($i = 1; $i <= 99; $i++) {
            StatistikPengunjung::create([
                "ip_address" => "192.168.0.$i",
                "user_agent" => "UserAgent $i"
            ]);
        }

        // Simulate the 100th visitor
        $response = $this->get('/', [
            'User-Agent' => 'TestUserAgent',
        ]);

        // Assert Telegram API was called
        Http::assertSent(function ($request) {
            return $request->url() === "https://api.telegram.org/bot" . env('TELEGRAM_TOKEN') . "/sendMessage" &&
                $request['chat_id'] === env('TELEGRAM_CHAT_ID') &&
                str_contains($request['text'], "telah dikunjungi sebanyak 100 kali");
        });

        // Assert the response status
        $response->assertStatus(200);
    }
}
