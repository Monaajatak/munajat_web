<?php

namespace App\Integrations\Aladhan;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AladhanClient
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('munajat.apis.aladhan_base_url');
    }

    /**
     * Get prayer timings by coordinates.
     */
    public function getTimingsByCoordinates(float $lat, float $lng, int $method = 5): array
    {
        try {
            $response = Http::timeout(10)
                ->get("{$this->baseUrl}/timings/" . now()->timestamp, [
                    'latitude' => $lat,
                    'longitude' => $lng,
                    'method' => $method,
                ]);

            if ($response->successful()) {
                return $response->json('data.timings', []);
            }

            Log::warning('Aladhan API returned non-success', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return [];
        } catch (\Exception $e) {
            Log::error('Aladhan API error: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get prayer timings by city.
     */
    public function getTimingsByCity(string $city, string $country, int $method = 5): array
    {
        try {
            $response = Http::timeout(10)
                ->get("{$this->baseUrl}/timingsByCity/" . now()->timestamp, [
                    'city' => $city,
                    'country' => $country,
                    'method' => $method,
                ]);

            if ($response->successful()) {
                return $response->json('data.timings', []);
            }

            return [];
        } catch (\Exception $e) {
            Log::error('Aladhan API error: ' . $e->getMessage());
            return [];
        }
    }
}
