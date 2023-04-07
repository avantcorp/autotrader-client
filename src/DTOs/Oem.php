<?php

declare(strict_types=1);

namespace Taz\AutoTraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class Oem extends DataTransferObject
{
    public ?string $make;
    public ?string $model;
    public ?string $derivative;
    public ?string $bodyType;
    public ?string $transmissionType;
    public ?string $drivetrain;
    public ?string $wheelbaseType;
    public ?string $roofHeightType;
    public ?string $engineType;
    public ?string $engineTechnology;
    public ?string $engineMarketing;
    public ?string $editionDescription;
    public ?string $colour;
}
