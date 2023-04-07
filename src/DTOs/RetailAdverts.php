<?php

namespace Taz\AutoTraderStockClient\DTOs;

class RetailAdverts extends SuppliedPrice
{
    public string $suppliedPrice;
    public string $priceOnApplication;
    public string $vatStatus;
    public string $attentionGrabber;
    public string $description;
    public string $description2;
    public string $priceIndicatorRating;
    public string $autotraderAdvert;
    public string $advertiserAdvert;
    public string $locatorAdvert;
    public string $exportAdvert;
    public string $profileAdvert;
    public string $displayOptions;

    public static function fromApi($data):RetailAdverts
    {
        return new static([
            'suppliedPrice'  => $data->suppliedPrice,
            '$priceOnApplication'  => $data->priceOnApplication,
    ]);
    }
}