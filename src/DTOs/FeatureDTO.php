<?php

namespace Avant\AutotraderStockClient\DTOs;

use Spatie\DataTransferObject\DataTransferObject;
use Avant\AutotraderStockClient\Enums\Category;
use Avant\AutotraderStockClient\Enums\Type;

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
