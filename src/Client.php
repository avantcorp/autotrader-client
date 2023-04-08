<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient;

use Carbon\Carbon;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Taz\AutoTraderStockClient\Collections\FeatureCollection;
use Taz\AutoTraderStockClient\DTOs\Stock;
use Taz\AutoTraderStockClient\DTOs\Vehicle;

class Client
{
    public const CACHE_KEY = 'autotrader-stock-client.access_token';
    private string $key;
    private string $secret;
    private string $advertiserId;
    private string $baseUrl;

    public function __construct($key, $secret, $advertiserId, $sandbox = false)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->advertiserId = $advertiserId;
        $this->baseUrl = sprintf('https://%s.autotrader.co.uk/', $sandbox ? 'api-sandbox' : 'api');
    }

    private function token(): string
    {
        return cache()->lock(static::CACHE_KEY.'-lock')
            ->block(10, function () {
                return cache()->get(static::CACHE_KEY, function () {
                    $tokenResponse = Http::baseUrl($this->baseUrl)
                        ->asForm()
                        ->post('authenticate', [
                            'key'    => $this->key,
                            'secret' => $this->secret,
                        ])
                        ->throw()
                        ->object();

                    return cache()->remember(
                        static::CACHE_KEY,
                        Carbon::parse($tokenResponse->expires)->subMinutes(5),
                        fn () => $tokenResponse->access_token
                    );
                });
            });
    }

    private function request(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl)
            ->withToken($this->token())
            ->acceptJson()
            ->asJson()
            ->withOptions(['query' => ['advertiserId' => $this->advertiserId]]);
    }

    public function getVehicle(string $registration, iterable $with = []): Models\Stock
    {
        $response = $this->request()
            ->get('/vehicles',
                array_merge(
                    ['registration' => sanitize_registration($registration),],
                    Collection::wrap($with)
                        ->mapWithKeys(fn ($option) => [$option => 'true'])
                        ->toArray()
                ))
            ->throw()
            ->object();

        return new Models\Stock($response);
    }

    public function getFeatures(string $registration): FeatureCollection
    {
        $response = $this->request()
            ->get('/vehicles', [
                'registration' => sanitize_registration($registration),
                'features'     => 'true',
                'vehicle'      => 'false',
            ])
            ->throw()
            ->object();

        return FeatureCollection::fromApi($response->features);
    }

    public function createStock(Vehicle $vehicle): Stock
    {
        $response = $this->request()
            ->post('/stock', [
                'vehicle'  => $vehicle,
                'metadata' => [
                    'externalStockReference' => $vehicle->registration,
                ],
            ])
            ->throw()
            ->json();

        return Stock::fromApi($response);
    }

    public function updateVehicle(Stock $stock): Stock
    {
        $response = $this->request()
            ->patch("/stock/{$stock->metadata->stockId}", $stock->toArray())
            ->throw()
            ->json();

        return Stock::fromApi($response);
    }

    /** @return Collection<Models\Stock>|Models\Stock[] */
    public function listStock(array $filters = []): Collection
    {
        $response = $this->request()
            ->get('/stock',
                array_merge([
                    // 'vehicle'         => 'false',
                    // 'advertiser'      => 'false',
                    // 'adverts'         => 'false',
                    // 'finance'         => 'false',
                    // 'metadata'        => 'false',
                    // 'features'        => 'false',
                    // 'media'           => 'false',
                    // 'responseMetrics' => 'false',
                    // 'check'           => 'false',
                ], $filters))
            ->throw()
            ->object();

        return collect($response->results)
            ->map(fn ($item) => new Models\Stock($item));
    }

    public function getStockByRegistration(string $registration): Stock
    {
        return $this->listStock([
            'registration' => sanitize_registration($registration),
        ])->first();
    }

    public function getStockByVin(string $vin): Stock
    {
        return $this->listStock([
            'vin' => $vin,
        ])->first();
    }

    public function getStockById(string $id): Stock
    {
        $response = $this->request()
            ->get("/stock/{$id}")
            ->throw()
            ->json();

        return Stock::fromApi($response);
    }
}
