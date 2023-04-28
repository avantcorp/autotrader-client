<?php

/**
 * @property \Taz\AutoTraderStockClient\Client $client
 */

declare(strict_types=1);

use Taz\AutoTraderStockClient\Enums\LifecycleState;
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
    $stock = $this->client->getVehicle('EN67BNU');
    $stock->adverts->retailAdverts->suppliedPrice->amountGBP = 100;
    $stock = $this->client->createStock($stock);
    expect($stock)->toBeInstanceOf(Stock::class)
        ->and($stock->metadata->lifecycleState)->not()->toBe(LifecycleState::Deleted);

    $stock->metadata->lifecycleState = 'DELETED';
    $stock = $this->client->updateStock($stock);
    expect($stock)->toBeInstanceOf(Stock::class)
        ->and($stock->metadata->lifecycleState)->toBe(LifecycleState::Deleted);
});

test('all stock DTOs', function (): void {
    $stock = $this->client->getStockByRegistration('KS17FOA');
});

test('delete all stock', function (): void {
    $this->client->listStock(['lifecycleState' => LifecycleState::ForeCourt])
        ->each(function (Stock $stock): void {
            $stock = $this->client->deleteStock($stock);
            expect($stock->metadata->isDirty('lifecycleState'))->toBeFalse();
        });
});

test('delete stock', function (): void {
    $registration = 'LM11AXN';
    $stock = $this->client->getStockByRegistration($registration);
    $stock = $this->client->deleteStock($stock);
    expect($stock->metadata->isDirty('lifecycleState'))->toBeFalse();
});

test('un publish stock', function (): void {
    $registration = 'LM11AXN';
    $stock = $this->client->getStockByRegistration($registration);
    $stock = $this->client->unpublishStock($stock);
    expect($stock)
        ->isDirty('autotraderAdvert')->toBeFalse();
});

test('get vehicle valuation', function (): void {
    $stock = $this->client->getVehicle('LM11AXN');
    //$stock = $this->client->getValuation($stock);

    dd($stock);
});

test('create or update', function (): void {
    $stock = $this->client->getVehicle('S31VNR');
    $stock = $this->client->createOrUpdateStock($stock);

    expect($stock)
        ->toBeInstanceOf(Stock::class);
});
