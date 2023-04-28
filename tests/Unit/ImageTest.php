<?php

declare(strict_types=1);

use Taz\AutoTraderStockClient\Models\Image;

test('can upload image from url', function () {
    $url = 'https://www.windsorcars.uk/storage/vehicle_images/2022/05-1680612067.jpg';
    expect($this->client->createImageFromUrl($url))
        ->toBeInstanceOf(Image::class)
        ->toHaveKey('imageId');
});
