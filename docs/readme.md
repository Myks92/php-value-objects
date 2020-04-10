# Guide
Using Value Objects will avoid duplication of code, as well as make your properties more typed.

## Usage
Value Objects this library are divided into several logical groups:

- [Web](usage/web.md)
- [Identity](usage/identity.md)
- [Security](usage/security.md)
- [Person](usage/person.md)
- [Geography](usage/geography.md)
- [Money](usage/money.md)
- [Payment](usage/payment.md)
- [Content](usage/content.md)
- [Enum](usage/enum.md)

This separation is only a structuring of the Value Objects in library. You can use these objects as you discretion.

### Creating own Value Objects
This library has only popular value objects. But you can always create your own objects. Abstract classes are available in this library (`StringLiteral`,` Integer`, `Enum`), with which you can implement your own value objects, for example:

For string type
```php
use Myks92\ValueObjects\String\StringLiteral;

final class MyTitle extends StringLiteral
{
}
$myTitle = new MyTitle('Title');
$myTitle->getValue(); //Title
```

For integer type
```php
use Myks92\ValueObjects\Number\Integer;

final class MyAge extends Integer
{
}

$myAge = new MyAge(12);
$myAge->getValue(); //12
```

For option type
```php
use Myks92\ValueObjects\Enum\Enum;
/**
 * @method static MyStatus wait()
 * @method static MyStatus active()
 * @method static MyStatus blocked()
 */
final class MyStatus extends Enum
{
    private const WAIT = 'wait';
    private const ACTIVE = 'active';
    private const BLOCKED = 'blocked';
}

$myStatus = MyStatus::wait()->getValue(); //wait
$myStatus = MyStatus::active()->getValue(); //active
$myStatus = MyStatus::blocked()->getValue(); //blocked
```