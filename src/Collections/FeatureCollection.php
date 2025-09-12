<?php

declare(strict_types=1);

namespace Avant\AutoTraderClient\Collections;

use Illuminate\Support\Collection;
use Avant\AutoTraderClient\Enums\Type;
use Avant\AutoTraderClient\Models\Feature;

class FeatureCollection extends Collection
{
    public function filterByType(Type $type): FeatureCollection
    {
        return $this->filter(fn (Feature $feature) => $feature->type === $type);
    }

    public function standard(): FeatureCollection
    {
        return $this->filterByType(Type::Standard);
    }

    public function optional(): FeatureCollection
    {
        return $this->filterByType(Type::Optional);
    }

    public function groupByCategory(): Collection
    {
        return $this
            ->groupBy(fn (Feature $feature) => $feature->category)
            ->collect();
    }
}
