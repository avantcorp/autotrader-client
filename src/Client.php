<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient;

use Carbon\Carbon;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Taz\AutoTraderStockClient\Models\Stock;

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
            ->block(10, fn () => cache()->get(static::CACHE_KEY, fn () => with(
                Http::baseUrl($this->baseUrl)
                    ->asForm()
                    ->post('authenticate', [
                        'key'    => $this->key,
                        'secret' => $this->secret,
                    ])
                    ->throw()
                    ->object(),
                fn ($response) => cache()->remember(
                    static::CACHE_KEY,
                    Carbon::parse($response->expires)->subMinutes(5),
                    fn () => $response->access_token
                )
            )));
    }

    public function baseRequest(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl)
            ->withToken($this->token())
            ->acceptJson()
            ->withOptions(['query' => ['advertiserId' => $this->advertiserId]]);
    }

    private function request(): PendingRequest
    {
        return $this->baseRequest()
            ->asJson();
    }

    public function getVehicle(string $registration, iterable $with = []): Stock
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

        return new Stock($response);
    }

    public function createStock(Stock $stock): Stock
    {
        $stock->metadata->externalStockReference = $stock->vehicle->registration;

        $response = $this->request()
            ->post('/stock', $stock->toArray())
            ->throw()
            ->json();

        return new Stock($response);
    }

    public function updateStock(Stock $stock): Stock
    {
        $stock->syncChanges();
        $changes = $stock->getChanges();
        $response = $this->request()
            ->patch("/stock/{$stock->metadata->stockId}", $changes)
            ->throw()
            ->json();
        $stock->syncOriginal();

        return new Stock($response);
    }

    /** @return Collection<Stock>|Stock[] */
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
            ->mapInto(Stock::class);
    }

    public function getStockByRegistration(string $registration): ?Stock
    {
        return $this
            ->listStock(['registration' => sanitize_registration($registration)])
            ->first();
    }

    public function getStockByVin(string $vin): ?Stock
    {
        return $this
            ->listStock(['vin' => $vin])
            ->first();
    }

    public function getStockById(string $id): ?Stock
    {
        $response = $this->request()
            ->get("/stock/{$id}")
            ->throw()
            ->json();

        return new Stock($response);
    }

    public function createImageFromUrl(string $url): string
    {
        $content = Http::get($url)
            ->throw()
            ->body();

        $tempFile = tempnam('/tmp', 'IMG');
        file_put_contents($tempFile, $content);

        return $this->createImageFromFile($tempFile);
    }

    public function createImageFromFile(string $path): string
    {
        $response = $this->baseRequest()
            ->send('POST', '/images', [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($path, 'r'),
                    ],
                ],
            ])
            ->throw()
            ->object();

        return $response->imageId;
    }
}
