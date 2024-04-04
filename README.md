# Normalize Price

> Normalize any string or float to a float with 2 decimals.

## Installation

You can install the package via composer:

```bash
composer require seeders-group/normalize-price
```

## Usage

```php
use Seeders\NormalizePrice\NormalizePrice;

$normalizePrice = NormalizePrice();
$normalizePrice->normalize('1.000,00 EUR'); // 1000.00
```

or use the Facade:
```php
use Seeders\NormalizePrice\Facades\NormalizePrice;

NormalizePrice::normalize('1.000,00 EUR'); // 1000.00
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Jesse Hendriks](https://github.com/jessehendriks)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
