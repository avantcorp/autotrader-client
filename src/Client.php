<?php

namespace Taz\AutoTraderStockClient;

use Carbon\Carbon;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Taz\AutoTraderStockClient\DTOs\VehicleDTO;

class Client
{
    const BASE_URL = 'https://api.autotrader.co.uk/';
    const CACHE_KEY = 'autotrader-stock-client.access_token';

    private $key;
    private $secret;
    private $advertiserId;

    public function __construct($key, $secret, $advertiserId)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->advertiserId = $advertiserId;
    }

    private function getToken(): string
    {
        return Cache::lock(static::CACHE_KEY . '-lock')
            ->block(10, function () {
                return Cache::get(static::CACHE_KEY, function () {
                    $tokenResponse = Http::baseUrl(static::BASE_URL)
                        ->asForm()
                        ->post('authenticate', [
                            'key' => $this->key,
                            'secret' => $this->secret,
                        ])
                        ->throw()
                        ->object();
                    $expiry = Carbon::parse($tokenResponse->expires);

                    return Cache::remember(static::CACHE_KEY, $expiry, fn() => $tokenResponse->access_token);
                });
            });
    }

    private function request(): PendingRequest
    {
        return Http::baseUrl(static::BASE_URL)
            ->withToken($this->getToken())
            ->acceptJson()
            ->asJson()
            ->withOptions(['query' => ['advertiserId' => $this->advertiserId]]);
    }

    public function getVehicle(string $registration): VehicleDTO
    {
        $response = $this->request()
            ->get('/vehicles', [
                'registration' => $this->sanitizeRegistrationNumber($registration),
            ])
            ->throw()
            ->json();

        return new VehicleDTO(Arr::get($response, 'vehicle'));
    }

    public function postVehicle(VehicleDTO $vehicle)
    {
        $response = $this->request()
            ->post('/stock', [
                'vehicle' => $vehicle
            ])
            ->throw()
            ->object();
    }

    public function updateVehicle(VehicleDTO $vehicle)
    {
        $response = $this->request()
            ->patch('/stock', [
                'vehicle' => $vehicle
            ])
            ->throw()
            ->object();
    }

    public function listVehicles(array $filters = []): Collection
    {
        $response = $this->request()
            ->get('/stock', array_merge([
                'vehicle' => 'false',
                'advertiser' => 'false',
                'adverts' => 'false',
                'finance' => 'false',
                'metadata' => 'false',
                'features' => 'false',
                'media' => 'false',
                'responseMetrics' => 'false',
                'check' => 'false',
            ], $filters))
            ->throw()
            ->json();

        return collect(Arr::get($response, 'vehicles'))
            ->map(function ($vehicle) {
                return new VehicleDTO($vehicle);
            });
    }

    public function listVehiclesByReg(string $registration): VehicleDTO
    {
        return $this->listVehicles([
            'registration' => $this->sanitizeRegistrationNumber($registration),
        ])->first();
    }

    public function listVehiclesByVin(VehicleDTO $vehicleVin): VehicleDTO
    {
        return $this->listVehicles([
            'vin' => $vehicleVin
        ])->first();
    }

    public function sanitizeRegistrationNumber(string $registration): string
    {
        return (string)Str::of($registration)->upper()->replace(' ', '');
    }
}
