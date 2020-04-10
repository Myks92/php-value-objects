# Number
This groups Value Objects use for any string type

## Integer
### Available Methods
* `__construct()` The constructor create the value
* `__toString()` You can `echo $myValue`, it will display the string value.
* `getValue()` Returns the current value
* `isEqualTo()` Tests whether instances are equal (returns `true` if values are equal, `false` otherwise)

### Example
```php
use Myks92\ValueObjects\Number\Integer;

final class MyAge extends Integer
{
}

final class MyAge2 extends Integer
{
}

$myAge = new MyAge(12);
$myAge->getValue(); //12

$myAge2 = new MyAge2(14);
$myAge2->getValue(); //14
$myAge2->isEqualTo($myAge); //false

echo $myAge; //'12'
```