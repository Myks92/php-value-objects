# String
This groups Value Objects use for any string type

## String
### Available Methods
* `__construct()` The constructor checks that the value not empty
* `__toString()` You can `echo $myValue`, it will display the string value.
* `getValue()` Returns the current value
* `isEqualTo()` Tests whether instances are equal (returns `true` if values are equal, `false` otherwise)

### Example
```php
use Myks92\ValueObjects\String\StringLiteral;

final class MyTitle extends StringLiteral
{
}
$myTitle = new MyTitle('Title');
$myTitle->getValue(); //Title
```