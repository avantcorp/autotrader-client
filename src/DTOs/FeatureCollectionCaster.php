<?php

namespace Avant\AutotraderStockClient\DTOs;

use Spatie\DataTransferObject\FieldValidator;
use Spatie\DataTransferObject\ValueCaster;

class FeatureCollectionCaster extends ValueCaster
{
    public function cast($value, FieldValidator $validator): CollectionOfFeatures
    {
        return (new CollectionOfFeatures(array_map(
            fn(array $data) => new FeatureDTO(...$data),
            $value
        )))
            ->keyBy('name');
    }
}
