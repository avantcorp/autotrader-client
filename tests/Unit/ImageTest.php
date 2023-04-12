<?php

declare(strict_types=1);


test('can upload image from url', function(){
    $url = 'https://www.windsorcars.uk/storage/vehicle_images/2022/05-1680612067.jpg';
    $imageId = $this->client->createImageFromUrl($url);

    expect($imageId)->toBeString();
});