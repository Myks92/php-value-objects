# Value Objects

[![Packagist Version](https://poser.pugx.org/myks92/php-value-objects/v/stable.png)](https://packagist.org/packages/myks92/php-value-objects
) [![Total Downloads](https://poser.pugx.org/myks92/php-value-objects/v/unstable.png)](https://packagist.org/packages/myks92/php-value-objects
) [![Software License](https://poser.pugx.org/myks92/php-value-objects/license)](LICENSE.md)

[![Total Downloads](https://poser.pugx.org/myks92/php-value-objects/downloads)](https://packagist.org/packages/myks92/php-value-objects)
[![Monthly Downloads](https://poser.pugx.org/myks92/php-value-objects/d/monthly)](https://packagist.org/packages/myks92/php-value-objects)
[![Daily Downloads](https://poser.pugx.org/myks92/php-value-objects/d/daily)](https://packagist.org/packages/myks92/php-value-objects)

Branch | Travis |
------ | ------ |
1.x   | [![Build Status][travis_1x_badge]][travis_1x_link]
master | [![Build Status][travis_unstable_badge]][travis_unstable_link]

A set of PHP Value Objects to manage simple and composite values.

What are Value Objects

Value Objects are PHP [`objects`](http://php.net/manual/en/language.types.object.php) that represent and manage simple or complex values. Once set, the value object cannot
 be modified without changing its identity.

Simple value objects represent a simple value, like an email. Complex value objects represent complex values, that, in order to really represent a value, need more than one value, like a price that needs an amount and a currency to be understandable and have a sense.

PHP supports only two value object: the [`DateTime`](https://www.php.net/manual/en/class.datetime.php) object and
 [`DateTimeImmutable`](https://www.php.net/manual/ru/class.datetimeimmutable.php) object.

This library gives support for other kind of values.
   
## Installation

To install, use [composer](https://getcomposer.org):
```
composer require myks92/php-value-objects
```

## Documentation

All use instructions are located in [documentation](./docs/readme.md).

## Testing

```
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[travis_1x_badge]: https://travis-ci.org/Myks92/php-value-objects.svg?branch=1.x
[travis_1x_link]: https://travis-ci.org/Myks92/php-value-objects
[travis_unstable_badge]: https://travis-ci.org/Myks92/php-value-objects.svg?branch=master
[travis_unstable_link]: https://travis-ci.org/Myks92/php-value-objects