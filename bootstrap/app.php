<?php

use App\Http\Middleware\CaptchaMiddleware;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Middleware\MonitorPageErrors;
use App\Http\Middleware\NoCacheMidlleware;
use App\Http\Middleware\StatistikPengunjungMiddleware;
use App\Http\Middleware\ViewarticleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
        "checkRole"=> CheckRoleMiddleware::class,"viewArticle"=>ViewarticleMiddleware::class,
        "pengunjung"=>StatistikPengunjungMiddleware::class,"cache"=>NoCacheMidlleware::class,
        "captcha"=>CaptchaMiddleware::class,"monitorPage"=>MonitorPageErrors::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
