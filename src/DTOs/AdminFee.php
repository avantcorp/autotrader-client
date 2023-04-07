<?php

namespace Taz\AutoTraderStockClient\DTOs;

class AdminFee extends AmountGBP
{
    public string $amountGBP;
    public static function fromApi($data):AdminFee
    {
        return new static([
            'amountGBP' => $data->amountGBP,
        ]);
    }
}