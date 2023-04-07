<?php

namespace Taz\AutoTraderStockClient\DTOs;

class ManufacturerRRP extends AmountGBP
{
    public string $amountGBP;
    public static function fromApi($data):ManufacturerRRP
    {
        return new static([
            'amountGBP' => $data->amountGBP,
        ]);
    }
}