# Value Objects

[![Packagist Version](https://poser.pugx.org/myks92/php-value-objects/v/stable.png)](https://packagist.org/packages/myks92/php-value-objects
) [![Total Downloads](https://poser.pugx.org/myks92/php-value-objects/v/unstable.png)](https://packagist.org/packages/myks92/php-value-objects
) [![Software License](https://poser.pugx.org/myks92/php-value-objects/license)](LICENSE.md)

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