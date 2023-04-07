<?php

namespace Taz\AutoTraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class Advertiser extends DataTransferObject
{
    public string $advertiserId;
    public string $name;
    public string $segment;
    public string $website;
    public string $mobileWebsite;
    public string $phone;
    public array $location;
    public string $advertStrapline;

    public static function fromApi($data): Advertiser
    {
        return new static([
            'name'  => $data->name,
            'segment'  => $data->segment,
            'website'  => $data->mobileWebsite,
            'mobileWebsite'  => $data->mobileWebsite,
            'phone'  => $data->phone,
            'location'  => $data->location,
            'addressLineOne' => $data->addressLineOne,
            'town' => $data->town,
            'county' => $data->county,
            'region' => $data->region,
            'postCode' => $data->postCode,
            'latitude' => $data->latitude,
            'longitude' => $data->longitude,
            'advertStrapline' => $data->advertStrapline,
        ]);
    }
}


