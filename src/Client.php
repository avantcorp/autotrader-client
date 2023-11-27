<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient;

use Carbon\Carbon;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Taz\AutoTraderStockClient\Enums\LifecycleState;
use Taz\AutoTraderStockClient\Enums\PublishStatus;
use Taz\AutoTraderStockClient\Enums\With;
use Taz\AutoTraderStockClient\Models\Competitors;
use Taz\AutoTraderStockClient\Models\Image;
use Taz\AutoTraderStockClient\Models\Stock;
use Taz\AutoTraderStockClient\Models\Valuation;

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
        return cache()
            ->lock(static::CACHE_KEY.'-lock')
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

    /** @param With[]|Collection<With> $with */
    public function getVehicle(string $registration, iterable $with = [], iterable $query = []): Stock
    {
        $response = $this->request()
            ->get('/vehicles',
                array_merge(
                    [
                        'registration' => sanitize_registration($registration),
                        ...$query,
                    ],
                    Collection::wrap($with)
                        ->mapWithKeys(fn (With $option) => [$option->value => 'true'])
                        ->toArray()
                ))
            ->throw()
            ->object();

        return new Stock($response);
    }

    public function getValuation(Stock $stock): Stock
    {
        $response = $this->request()
            ->post('/valuations', $stock->only(['vehicle']))
            ->throw()
            ->object();

        return new Stock($response);
    }

    public function getVehicleMetrics(Stock $stock, int $mileage): Valuation
    {
        $response = $this->request()
            ->post('/vehicle-metrics', [
                'vehicle' => [
                    'derivativeId'          => $stock->vehicle->derivativeId,
                    'firstRegistrationDate' => $stock->vehicle->firstRegistrationDate,
                    'odometerReadingMiles'  => $mileage,
                ],
            ])
            ->throw()
            ->object();

        return new Valuation($response);
    }

    public function getCompetitors(string $href, array $query): Competitors
    {
        $response = $this->request()
            ->get($href,
                collect($query)
                    ->put('advertiserId', $this->advertiserId)
                    ->toArray()
            )
            ->throw()
            ->object();

        return new Competitors($response);
    }

    public function createStock(Stock $stock): Stock
    {
        $stock->metadata->externalStockReference = $stock->vehicle->registration;

        $response = $this->request()
            ->post('/stock', $stock->only(['vehicle', 'metadata', 'features']))
            ->throw()
            ->json();

        return new Stock($response);
    }

    public function updateStock(Stock $stock): Stock
    {
        $stock->syncChanges();
        $changes = $stock->getChanges();
        if (empty($changes)) {
            return $stock;
        }

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
            ->get('/stock', $filters)
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

    public function createImageFromUrl(string $url): Image
    {
        $content = Http::get($url)
            ->throw()
            ->body();

        $tempFile = tempnam('/tmp', 'IMG');
        file_put_contents($tempFile, $content);

        return $this->createImageFromFile($tempFile);
    }

    public function createImageFromFile(string $path): Image
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
            ->json();

        return new Image($response);
    }

    public function deleteStock(Stock $stock): Stock
    {
        $stock->metadata->lifecycleState = LifecycleState::Deleted;

        $stock->adverts->retailAdverts->autotraderAdvert->status = PublishStatus::NotPublished;
        $stock->adverts->retailAdverts->advertiserAdvert->status = PublishStatus::NotPublished;
        $stock->adverts->retailAdverts->locatorAdvert->status = PublishStatus::NotPublished;
        $stock->adverts->retailAdverts->profileAdvert->status = PublishStatus::NotPublished;

        return $this->updateStock($stock);
    }

    public function unpublishStock(Stock $stock): Stock
    {
        $stock->adverts->retailAdverts->autotraderAdvert->status = PublishStatus::NotPublished;

        return $this->updateStock($stock);
    }

    public function createOrUpdateStock(Stock $stock)
    {
        try {
            return $this->createStock($stock);
        } catch (RequestException $exception) {
            if ($exception->response->status() === Response::HTTP_CONFLICT) {
                $errorMessage = collect($exception->response->object()->messages ?? [])->first()?->message;
                $stockId = Str::of($errorMessage)->match('/\w{32}$/');
                $stock->metadata->stockId = $stockId;

                return $this->updateStock($stock);
            }

            throw $exception;
        }
    }
}
