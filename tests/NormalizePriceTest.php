<?php

use Seeders\NormalizePrice\Facades\NormalizePrice;

test('normalize float', function () {
    $price = fake()->randomFloat(2, 0, 1000);

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe($price);
});

test('normalize price float above 1000', function () {
    $price = fake()->randomFloat(2, 1000, 10000);

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe($price);
});

test('normalize price string', function () {
    $price = '123,45';

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(123.45);
});

test('normalize price string with euro sign', function () {
    $price = '€123,45';

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(123.45);
});

test('normalize price string with euro sign above 1000', function () {
    $price = '€1.234,56';

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(1234.56);
});

test('normalize price string above 1000', function () {
    $price = '1.000,00';

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(1000.00);
});

test('normalize price string with euro sign above 1000 with dot and comma switched', function () {
    $price = '€1,234.56';

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(1234.56);
});

test('normalize price string above 1000  with dot and comma switched', function () {
    $price = '1,000.00';

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(1000.00);
});

test('normalize price without dot or comma', function () {
    $price = '1010';

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(1010.00);
});

test('normalize price without dot or comma ', function () {
    $price = 1010;

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(1010.00);
});

test('normalize price without string with euro sign', function () {
    $price = '€ 1,010.00';

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(1010.00);
});

test('normalize price without string with euro sign bla', function () {
    $price = '1.073,55 EUR';

    $normalizedPrice = NormalizePrice::normalize($price);

    expect($normalizedPrice)->toBeFloat()
        ->and($normalizedPrice)->toBe(1073.55);
});
