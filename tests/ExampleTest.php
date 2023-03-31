<?php

test('example', function () {
    $client = new \Taz\AutoTraderStockClient\Client(
        'key',
        'secret',
        'advertiserId'
    );

    $client->getVehicle('AB12CDE');
});
