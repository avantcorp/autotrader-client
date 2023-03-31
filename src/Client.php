<?php

namespace Avant\AutotraderStockClient;

use Avant\AutotraderStockClient\DTOs\VehicleDTO;
use Carbon\Carbon;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
        return Cache::lock(static::CACHE_KEY.'-lock')
            ->block(10, function () {
                return Cache::get(static::CACHE_KEY, function () {
                    $tokenResponse = Http::baseUrl(static::BASE_URL)
                        ->asForm()
                        ->post('authenticate', [
                            'key'    => $this->key,
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
            ->withOptions([RequestOptions::QUERY => ['advertiserId' => $this->advertiserId]]);
    }

    public function getVehicle(string $registration): VehicleDTO
    {
        $response = $this->request()
            ->get('/service/stock-management/vehicles', [
                'registration' => (string) Str::of($registration)->upper()->replace(' ', ''),
            ])
            ->throw()
            ->json();

        return new VehicleDTO(Arr::get($response, 'vehicle'));
    }

    public function postVehicle(VehicleDTO $vehicle)
    {
        $response = $this->request()
            ->post('/service/stock-management/stock', [
                'vehicle' => $vehicle
            ])
            ->throw()
            ->json();
    }
}