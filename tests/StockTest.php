<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Models;

test('get stock list', function (): void {
    $stock = $this->client->listStock();

    expect($stock)
        ->toBeInstanceOf(Collection::class)
        ->and($stock->count())
        ->toBeGreaterThanOrEqual(1);

    $stock->each(fn (Models\Stock $stock) => expect($stock->metadata->stockId)
        ->not()->toBeNull());
});

test('create stock', function (): void {
    $response = $this->client->createStock(
        $this->client->getVehicle('LM11AXN')
    );
});

test('list vehicle by reg no.', function (): void {
    $stock = $this->client->getStockByRegistration('LM11AXN');
});

test('create and delete vehicle', function (): void {
    $vehicle = $this->client->getVehicle('GX65OKB');
    $stock = $this->client->createStock($vehicle);
    expect($stock)->toBeInstanceOf(Stock::class)
        ->and($stock->metadata->lifecycleState)->not()->toBe('DELETED');

    $stock->metadata->lifecycleState = 'DELETED';
    $stock = $this->client->updateVehicle($stock);
    expect($stock)->toBeInstanceOf(Stock::class)
        ->and($stock->metadata->lifecycleState)->toBe('DELETED');
});

test('all stock DTOs', function (): void {
    $stock = $this->client->getStockByRegistration('KS17FOA');
});
