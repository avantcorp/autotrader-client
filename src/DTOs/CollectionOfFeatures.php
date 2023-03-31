<?php

namespace Taz\AutoTraderStockClient\DTOs;

use Illuminate\Support\Collection;
use Taz\AutoTraderStockClient\Enums\Type;

class CollectionOfFeatures extends Collection
{
    public function offsetGet($key): FeatureDTO
    {
        return parent::offsetGet($key);
    }

    public function standard(): CollectionOfFeatures
    {
        return $this->filter(fn(FeatureDTO $feature) => $feature->type === Type::standard());
    }

    public function optional(): CollectionOfFeatures
    {
        return $this->filter(fn(FeatureDTO $feature) => $feature->type === Type::optional());
    }

    public function groupByCategory(): CollectionOfFeatures
    {
        return $this->groupBy(fn(FeatureDTO $feature) => $feature->category->labels(), true);
    }
}
