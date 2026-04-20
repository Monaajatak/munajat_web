<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// SEO
Route::get('/sitemap.xml', function () {
    return response()->view('sitemap')->header('Content-Type', 'text/xml');
});

Route::get('/robots.txt', function () {
    return response()->view('robots')->header('Content-Type', 'text/plain');
});

/*
|--------------------------------------------------------------------------
| API Proxy Routes (cached server-side)
|--------------------------------------------------------------------------
*/
Route::prefix('api')->group(function () {
    Route::get('/prayer-times', [HomeController::class, 'prayerTimes'])->name('api.prayer-times');
});
