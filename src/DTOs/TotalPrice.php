<?php

namespace Taz\AutoTraderStockClient\DTOs;

class TotalPrice extends AmountGBP
{
    public string $amountGBP;
    public static function fromApi($data):TotalPrice
    {
        return new static([
            'amountGBP' => $data->amountGBP,
        ]);
    }
}