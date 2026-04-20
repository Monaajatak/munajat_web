<?php

namespace App\Services;

use App\Integrations\Aladhan\AladhanClient;
use Illuminate\Support\Facades\Cache;

class PrayerTimeService
{
    public function __construct(private AladhanClient $client)
    {
    }

    /**
     * Get today's prayer timings by coordinates (cached).
     */
    public function getTodayTimings(float $lat, float $lng): array
    {
        $cacheKey = "prayer-times:{$lat}:{$lng}:" . now()->format('Y-m-d');
        $ttl = config('munajat.cache.prayer_times_ttl', 360);

        return Cache::remember($cacheKey, now()->addMinutes($ttl), function () use ($lat, $lng) {
            return $this->client->getTimingsByCoordinates($lat, $lng);
        });
    }

    /**
     * Get today's prayer timings by city name (cached).
     */
    public function getTodayTimingsByCity(string $city, string $country): array
    {
        $cacheKey = "prayer-times:{$city}:{$country}:" . now()->format('Y-m-d');
        $ttl = config('munajat.cache.prayer_times_ttl', 360);

        return Cache::remember($cacheKey, now()->addMinutes($ttl), function () use ($city, $country) {
            return $this->client->getTimingsByCity($city, $country);
        });
    }
}
