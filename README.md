> ⚠️ Still undergoing development. Do not use in production yet



[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Livewire components for eloquent models such as like, dislike, delete etc

[![Latest Version on Packagist](https://img.shields.io/packagist/v/titonova/shock-components.svg?style=flat-square)](https://packagist.org/packages/titonova/shock-components)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/titonova/shock-components/run-tests?label=tests)](https://github.com/titonova/shock-components/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/titonova/shock-components/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/titonova/shock-components/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/titonova/shock-components.svg?style=flat-square)](https://packagist.org/packages/titonova/shock-components)

Extremely simple Frontend and Backend resuable UI components for performing common actions on Eloquent models such as delete, like, dislike, bookmark etc, built with livewire and [Wire UI](https://github.com/wireui/wireui), and rendered using [X-livewire](https://github.com/titonova/x-livewire).

E.g:

For a delete button, this would render a delete button, with a confirm dialog, and a delete action in the backend, without any other setup. Just pop it in your view and it would do the rest.

```Blade
<x-livewire _="shock::delete" :obj="$post" />
```
### 

## Installation

You can install the package via composer:

```bash
composer require titonova/shock-components
```


Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="shock-components-views"
```

## Usage

...



## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/titonova/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [titonova](https://github.com/titonova)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
