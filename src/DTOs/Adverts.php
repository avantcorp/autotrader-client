<?php

namespace Taz\AutoTraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;
class Adverts extends DataTransferObject
{
    public string $forecourtPrice;
    public ?string $amountGBP;
    public string $forecourtPriceVatStatus;
    public string $dueDate;
    public string $manufacturerApproved;
    public string $twelveMonthsMot;
    public array $motInsurance;
    public string $reservationStatus;
    public string $retailAdverts;
    public string $suppliedPrice;
    public string $postCode;
    public float $latitude;
    public float $longitude;
    public string $advertStrapline;
    public string $tradeAdverts;

    public static function fromApi($data): Adverts
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
            'tradeAdverts' => $data->$tradeAdverts,
        ]);
    }
}