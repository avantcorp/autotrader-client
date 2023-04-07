<?php

declare(strict_types=1);

use Taz\AutoTraderStockClient\Collections\FeatureCollection;
use Taz\AutoTraderStockClient\DTOs;

test('get vehicle', function (): void {
    expect($this->client->getVehicle('KS17FOA'))
        ->toBeInstanceOf(DTOs\Vehicle::class);
});

test('get with features', function (): void {
    $features = $this->client->getFeatures('KS17FOA');
    expect($features)
        ->toBeInstanceOf(FeatureCollection::class);
});
