<?php

namespace Seeders\NormalizePrice\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Seeders\NormalizePrice\NormalizePrice
 *
 * @method static float normalize(string|float $price)
 */
class NormalizePrice extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Seeders\NormalizePrice\NormalizePrice::class;
    }
}
