<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('id_ID');
        Blade::component('right-component-fe', \App\View\Components\RightFeComponent::class);
        Blade::component('footer', \App\View\Components\Footer::class);

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Terimakasih telah mendaftar akun di website resmi Smkn 1 Gedangan , klik button dibawah ini untuk verifikasi email.')
                ->action('Verifikasi Email Anda ', $url);
        });
    }
}
