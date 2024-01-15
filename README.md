# Pulse Spatie Health Card

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dutchcodingcompany/pulse-spatie-health.svg?style=flat-square)](https://packagist.org/packages/DutchCodingCompany/pulse-spatie-health)

Display the results of the [spatie/laravel-health](https://spatie.be/docs/laravel-health/v1/introduction) package on the [Laravel Pulse](https://pulse.laravel.com/) dashboard.

![example-screenshot.png](docs-assets%2Fscreenshots%2Fexample-screenshot.png)

---
## Installation

You can install the package via composer:

```bash
composer require dutchcodingcompany/pulse-spatie-health
```

## Usage

You need to publish the Pulse Dashboard view with the following command:

```bash
php artisan vendor:publish --tag=pulse-dashboard
```

Now you can add the card to the dashboard view (`resources/views/vendor/pulse/dashboard.blade.php`):

```html
<x-pulse>
    <livewire:pulse.spatie-health cols="6"/>

    {{-- Add more cards here --}}
</x-pulse>
```

Follow the [spatie/laravel-health](https://spatie.be/docs/laravel-health/v1/installation-setup) documentation to configure the health checks.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Bram Raaijmakers](https://github.com/bramr94)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
