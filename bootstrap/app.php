<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->registered(function (Application $app) {
        // Handle Vercel's read-only filesystem
        if (env('VERCEL')) {
            $app->useStoragePath('/tmp/storage');
            
            // Ensure necessary directories exist in /tmp
            if (!is_dir('/tmp/storage/framework/views')) {
                mkdir('/tmp/storage/framework/views', 0755, true);
            }
            if (!is_dir('/tmp/storage/framework/cache')) {
                mkdir('/tmp/storage/framework/cache', 0755, true);
            }
            if (!is_dir('/tmp/storage/framework/sessions')) {
                mkdir('/tmp/storage/framework/sessions', 0755, true);
            }
        }
    })
    ->create();
