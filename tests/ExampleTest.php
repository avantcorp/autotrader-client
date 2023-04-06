<?php

use Taz\AutoTraderStockClient\DTOs\VehicleDTO;

test('basic get vehicle', function () {
    expect($this->client->getVehicle('KS17FOA'))
        ->toBeInstanceOf(VehicleDTO::class);
});
