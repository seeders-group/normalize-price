# Normalize Price

> Normalize any string or float to a float with 2 decimals.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/normalize-price.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/normalize-price)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can
support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.
You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards
on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require seeders-group/normalize-price
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="normalize-price-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="normalize-price-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="normalize-price-views"
```

## Usage

```php
$normalizePrice = new Seeders\NormalizePrice();
echo $normalizePrice->echoPhrase('Hello, Seeders!');
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
