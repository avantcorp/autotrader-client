<?php

declare(strict_types=1);

use Taz\AutoTraderStockClient\Enums\Type;
use Taz\AutoTraderStockClient\Models;

test('get vehicle', function (): void {
    $registration = 'KS17FOA';

    expect($this->client->getVehicle($registration))
        ->toBeInstanceOf(Models\Stock::class)
        ->toHaveKey('vehicle.registration', $registration);
});

test('get with features', function (): void {
    $stock = $this->client->getVehicle('KS17FOA', ['features']);
    expect($stock)
        ->toHaveKey('features')
        ->and($stock->features)
        ->toBeIterable();

    $stock->features
        ->each(fn (Models\Feature $feature) => expect($feature->type)->toBeInstanceOf(Type::class));
});
