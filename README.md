<p align="center">
    <a href="https://bombenprodukt.com" target="_blank">
        <img src="https://raw.githubusercontent.com/BombenProdukt/assets/main/logo-text.svg" width="128" alt="BombenProdukt Logo" />
    </a>
</p>

<p align="center">
    <a href="https://github.com/BombenProdukt/laravel-passage/actions">
        <img src="https://badge.sh/github/check-runs/BombenProdukt/laravel-passage" alt="Checks" />
    </a>
    <a href="https://packagist.org/packages/bombenprodukt/laravel-passage">
        <img src="https://badge.sh/packagist/downloads/BombenProdukt/laravel-passage" alt="Downloads" />
    </a>
    <a href="https://packagist.org/packages/bombenprodukt/laravel-passage">
        <img src="https://badge.sh/packagist/version/BombenProdukt/laravel-passage" alt="Version" />
    </a>
    <a href="https://packagist.org/packages/bombenprodukt/laravel-passage">
        <img src="https://badge.sh/packagist/license/BombenProdukt/laravel-passage" alt="License" />
    </a>
</p>

## About Laravel Passage

This project was created by, and is maintained by [BombenProdukt](https://github.com/BombenProdukt), and is a package to integrate Passage by 1Password with Laravel. Be sure to browse through the [changelog](CHANGELOG.md), [code of conduct](.github/CODE_OF_CONDUCT.md), [contribution guidelines](.github/CONTRIBUTING.md), [license](LICENSE), and [security policy](.github/SECURITY.md).

> **Warning**
> This package is still in development and is not ready for production use. Use at your own risk.

## Installation

> **Note**
> This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/laravel-passage
```

You can publish the migrations by using:

```bash
$ php artisan vendor:publish --tag="laravel-passage-migrations"
```

You can publish the configuration file by using:

```bash
$ php artisan vendor:publish --tag="laravel-passage-config"
```

## Usage

Please review the contents of [our test suite](/tests) for detailed usage examples.
