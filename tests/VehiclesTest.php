<?php

declare(strict_types=1);

use Taz\AutoTraderStockClient\DTOs\VehicleDTO;

test('get vehicle', function (): void {
    expect($this->client->getVehicle('KS17FOA'))
        ->toBeInstanceOf(VehicleDTO::class);
});
