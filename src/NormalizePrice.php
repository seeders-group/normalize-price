<?php

namespace Seeders\NormalizePrice;

class NormalizePrice
{
    public function normalize(string|float $price)
    {
        if (is_float($price)) {
            return $this->roundFloat($price);
        }

        // Remove all non-numeric characters except comma and dot (euro signs, etc.)
        $price = preg_replace('/[^\d.,\s]+/', '', $price);

        $price = trim($price);

        // Normalize the price to a float value
        $price = $this->parsePrice($price);

        $float = str($price)
            ->remove(',')
            ->toFloat();

        return $this->roundFloat($float);
    }

    private function parsePrice($price)
    {
        if (preg_match('/^\d{1,3}(,\d{3})*\.\d{2}$/', $price)) {
            // Remove thousands separator for format: 1,000.00
            return str_replace(',', '', $price);
        } elseif (preg_match('/^\d{1,3}(\.\d{3})*,\d{2}$/', $price)) {
            // Convert to standard decimal point format: 1.000,00 -> 1000.00
            ray($price, 'optie 2');
            return str_replace(',', '.', str_replace('.', '', $price));
        }

        // Return the price without modifications if it doesn't match expected formats
        return $price;
    }

    private function roundFloat(float $price): float
    {
        return round($price, 2);
    }
}
