<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\DTOs\Stock;

test('get stock list', function (): void {
    $stock = $this->client->listStock();

    expect($stock)
        ->toBeInstanceOf(Collection::class)
        ->and($stock->count())
        ->toBeGreaterThanOrEqual(1);

    $stock
        ->each(fn ($stock) => expect($stock)->toBeInstanceOf(Stock::class));
});

test('create stock', function () {
    $response = $this->client->createStock(
        $this->client->getVehicle('EA63OXH')
    );
});
