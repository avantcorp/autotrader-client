<?php

namespace Taz\AutoTraderStockClient\DTOs;

class SuppliedPrice extends AmountGBP
{
    public string $amountGBP;
    public static function fromApi($data):SuppliedPrice
    {
        return new static([
            'amountGBP' => $data->amountGBP,
        ]);
    }
}

