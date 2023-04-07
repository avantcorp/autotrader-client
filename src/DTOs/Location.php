<?php

namespace Taz\AutoTraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class Location extends DataTransferObject
{
    public string $addressLineOne;
    public string $town;
    public ?string $county;
    public string $region;
    public string $postCode;
    public float $latitude;
    public float $longitude;
}