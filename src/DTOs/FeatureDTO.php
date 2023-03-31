<?php

namespace Taz\AutoTraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;
use Taz\AutoTraderStockClient\Enums\Category;
use Taz\AutoTraderStockClient\Enums\Type;

class FeatureDTO extends DataTransferObject
{
    public string $name;
    public ?string $genericName;
    public Type $type;
    public Category $category;
    public ?float $basicPrice;
    public ?float $vatPrice;
    public ?bool $factoryFitted;
}
