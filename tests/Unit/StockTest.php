<?php

declare(strict_types=1);

use Taz\AutoTraderStockClient\Models\Stock;

test('get stock list', function (): void {
    $stockList = $this->client->listStock();

    expect($stockList)
        ->toBeCollectionOf(Stock::class)
        ->and($stockList->count())
        ->toBeGreaterThanOrEqual(1);
});

test('create stock', function (): void {
    $response = $this->client->createStock(
        $this->client->getVehicle('LM11AXN')
    );
});

test('create and delete vehicle', function (): void {
    $vehicle = $this->client->getVehicle('GX65OKB');
    $stock = $this->client->createStock($vehicle);
    expect($stock)->toBeInstanceOf(Stock::class)
        ->and($stock->metadata->lifecycleState)->not()->toBe('DELETED');

    $stock->metadata->lifecycleState = 'DELETED';
    $stock = $this->client->updateStock($stock);
    expect($stock)->toBeInstanceOf(Stock::class)
        ->and($stock->metadata->lifecycleState)->toBe('DELETED');
});

test('all stock DTOs', function (): void {
    $stock = $this->client->getStockByRegistration('KS17FOA');
});

test('delete all stock', function (): void {
    $this->client->listStock(['lifecycleState' => 'FORECOURT'])
        ->each(function (Stock $stock): void {
            $stock = $this->client->deleteStock($stock);
            expect($stock->metadata->isDirty('lifecycleState'))->toBeFalse();
        });
});

test('delete stock', function (): void {
    $registration = 'YG69VHK';
    $stock = $this->client->getStockByRegistration($registration);
    $stock = $this->client->deleteStock($stock);
    expect($stock->metadata->isDirty('lifecycleState'))->toBeFalse();
});
