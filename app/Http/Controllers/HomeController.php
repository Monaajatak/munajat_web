<?php

namespace App\Http\Controllers;

use App\Services\PrayerTimeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private PrayerTimeService $prayerTimeService)
    {
    }

    /**
     * Display the landing page.
     */
    public function index()
    {
        return view('home', [
            'activeNav' => 'home',
        ]);
    }

    /**
     * API proxy for prayer times (cached server-side).
     */
    public function prayerTimes(Request $request)
    {
        $lat = $request->float('lat', 30.0444);  // Default: Cairo
        $lng = $request->float('lng', 31.2357);

        $timings = $this->prayerTimeService->getTodayTimings($lat, $lng);

        return response()->json([
            'success' => !empty($timings),
            'data' => $timings,
        ]);
    }
}
