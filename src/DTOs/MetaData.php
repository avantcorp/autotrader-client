<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\DTOs;

use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class MetaData extends DataTransferObject
{
    public string $stockId;
    public string $searchId;
    public ?string $externalStockId;
    public ?string $externalStockReference;
    public Carbon $lastUpdated;
    public Carbon $lastUpdatedByAdvertiser;
    public int $versionNumber;
    public string $lifecycleState;
    public Carbon $dateOnForecourt;

    public static function fromApi($data): MetaData
    {
        return new static([
            'stockId'                 => $data['stockId'],
            'searchId'                => $data['searchId'],
            'externalStockId'         => $data['externalStockId'],
            'externalStockReference'  => $data['externalStockReference'],
            'lastUpdated'             => Carbon::parse($data['lastUpdated']),
            'lastUpdatedByAdvertiser' => Carbon::parse($data['lastUpdatedByAdvertiser']),
            'versionNumber'           => $data['versionNumber'],
            'lifecycleState'          => $data['lifecycleState'],
            'dateOnForecourt'         => Carbon::parse($data['dateOnForecourt']),
        ]);
    }
}
