# This package queries different crypto currency networks, when given an address and a network and returns the balance of said address.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tevli/crypto-balance-checker.svg?style=flat-square)](https://packagist.org/packages/tevli/crypto-balance-checker)
[![Tests](https://img.shields.io/github/actions/workflow/status/tevli/crypto-balance-checker/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tevli/crypto-balance-checker/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/tevli/crypto-balance-checker.svg?style=flat-square)](https://packagist.org/packages/tevli/crypto-balance-checker)

This is where your description should go. Try and limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require tevli/crypto-balance-checker
```

## Usage

```php
use Tevli\CryptoBalanceChecker\Ethereum;

$eth = new Ethereum('wallet','apiKey');
$balance =  $eth->getBalance()->toWei();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Iwuoha Precious Ebube](https://github.com/tevli)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
