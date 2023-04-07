<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class Stock extends DataTransferObject
{
    public ?MetaData $metadata;
    public ?Vehicle $vehicle;

    public static function fromApi($data): Stock
    {
        return new static([
            'metadata' => array_key_exists('metadata', $data) ? MetaData::fromApi($data['metadata']) : null,
            'vehicle'  => array_key_exists('vehicle', $data) ? Vehicle::fromApi($data['vehicle']) : null,
        ]);
    }
}
