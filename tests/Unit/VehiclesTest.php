<?php

declare(strict_types=1);

use Avant\AutoTraderClient\Models;

test('get vehicle', function (): void {
    $registration = 'KS17FOA';
    expect($this->client->getVehicle($registration))
        ->toBeInstanceOf(Models\Stock::class)
        ->toHaveKey('vehicle.registration', $registration);
});

test('get vehicle with features', function (): void {
    $stock = $this->client->getVehicle('KS17FOA', ['features']);
    expect($stock->features)
        ->toBeCollectionOf(Models\Feature::class);
});
