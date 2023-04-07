<?php

namespace Taz\AutoTraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class DisplayOptions extends DataTransferObject
{
    public string $excludePreviousOwners;
    public string $excludeStrapline;
    public string $excludeMot;
    public string $excludeWarranty;
    public string $excludeInteriorDetails;
    public string $excludeTyreCondition;
    public string $excludeBodyCondition;

    public static function fromApi($data):DisplayOptions
    {
        return new static([
            'excludePreviousOwners'  => $data->excludePreviousOwners,
            'excludeStrapline'  => $data->excludeStrapline,
            'excludeMot'  => $data->excludeMot,
            'excludeWarranty'  => $data->excludeWarranty,
            'excludeInteriorDetails'  => $data->excludeInteriorDetails,
            'excludeTyreCondition'  => $data->excludeTyreCondition,
            'excludeBodyCondition'  => $data->excludeBodyCondition,
        ]);
    }
}