<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $params = [
            'chat_id' => config("services.telegram.chat_id"),
            'text' => "Halaman Admin dibuka pada " .now() ."\n" ."dengan user \n" . Auth::user()->name .
            " dan email \n" . Auth::user()->email
        ];
        $url = "https://api.telegram.org/bot" . config("services.telegram.bot_token") . "/sendMessage";
        $response = Http::post($url, $params);

        if ($response->successful()) {
            Log::info("Halaman Admin Dibuka pada" . now());
        } else {
            Log::error("Halaman Admin Dibuka pada: " .now());
        }
        if(Auth::user()->role === 2){
            if (!Auth::user()->hasVerifiedEmail()) {
                return redirect()->route('verification.notice')
                    ->with('error', 'Silakan verifikasi email Anda terlebih dahulu.');
            }
            return redirect()->intended(route("welcome"))->with("success","anda berhasil login");
        }
        $request->session()->put("captcha_validated",true);

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
