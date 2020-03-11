# PHP Value Objects

[![Packagist Version][stable]](https://packagist.org/packages/myks92/php-value-objects
) [![Total Downloads](https://poser.pugx.org/myks92/php-value-objects/v/unstable.png)](https://packagist.org/packages/myks92/php-value-objects
) [![Software License](https://poser.pugx.org/myks92/php-value-objects/license)](LICENSE.md)
[![PHP Version][badge-php]][php]
[![Total Downloads](https://poser.pugx.org/myks92/php-value-objects/downloads)](https://packagist.org/packages/myks92/php-value-objects)
[![composer.lock](https://poser.pugx.org/myks92/php-value-objects/composerlock)](https://packagist.org/packages/myks92/php-value-objects)

Branch | Travis |
------ | ------ |
1.x   | [![Build Status][badge-travis-1x]][travis-1x]
master | [![Build Status][badge-travis-unstable]][travis-unstable]

A set of PHP Value Objects to manage simple and composite values.

What are Value Objects

Value Objects are PHP [`objects`](http://php.net/manual/en/language.types.object.php) that represent and manage simple or complex values. Once set, the value object cannot
 be modified without changing its identity.

Simple value objects represent a simple value, like an email. Complex value objects represent complex values, that, in order to really represent a value, need more than one value, like a price that needs an amount and a currency to be understandable and have a sense.

PHP supports several value object e.g.: the [`DateTime`](https://www.php.net/manual/en/class.datetime.php) object and
 [`DateTimeImmutable`](https://www.php.net/manual/ru/class.datetimeimmutable.php) object.

This library gives support for other kind of values.
   
## Installation

To install, use [composer](https://getcomposer.org):
```
composer require myks92/php-value-objects
```

## Documentation

All use instructions are located in [documentation][].

## Testing

```
composer test
```

## Changelog

Please see [CHANGELOG][] for more information on what has changed recently.

## License

The MIT License (MIT). Please see [LICENSE][] for more information.

[badge-php]: https://img.shields.io/packagist/php-v/Myks92/php-value-objects.svg?style=flat-square
[badge-travis-1x]: https://travis-ci.org/Myks92/php-value-objects.svg?branch=1.x
[badge-travis-unstable]: https://travis-ci.org/Myks92/php-value-objects.svg?branch=master

[documentation]: https://github.com/Myks92/php-value-objects/blob/master/docs/readme.md
[source]: https://github.com/Myks92/php-value-objects
[stable]: https://poser.pugx.org/myks92/php-value-objects/v/stable.png
[changelog]: https://github.com/Myks92/php-value-objects/blob/master/CHANGELOG.md
[license]: https://github.com/Myks92/php-value-objects/blob/master/LICENSE.md
[php]: https://php.net
[travis-1x]: https://travis-ci.org/Myks92/php-value-objects
[travis-unstable]: https://travis-ci.org/Myks92/php-value-objects