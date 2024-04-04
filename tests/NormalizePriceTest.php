<?php

use Seeders\NormalizePrice\Facades\NormalizePrice;

test('normalize float', function () {
    $price = fake()->randomFloat(2, 0, 1000);

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe($price);
});

test('normalize float above 1000', function () {
    $price = fake()->randomFloat(2, 1000, 10000);

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe($price);
});

test('normalize strings', function () {
    $data = [
        '123,45' => 123.45,
        '€123,45' => 123.45,
        '€1.234,56' => 1234.56,
        '1.000,00' => 1000.00,
        '€1,234.56' => 1234.56,
        '1,000.00' => 1000.00,
        '1010' => 1010.00,
        '€ 1,010.00' => 1010.00,
        '1.073,55 EUR' => 1073.55,
    ];

    foreach ($data as $price => $expected) {
        $normalizedPrice = NormalizePrice::normalize($price);
        expect($normalizedPrice)->toBeFloat()
            ->and($normalizedPrice)->toBe($expected);
    }
});
