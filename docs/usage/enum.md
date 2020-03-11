# Enum
This groups Value Objects use for any options, e.g status, role, gender or another objects with key-value.

## Available Methods
* `__construct()` The constructor checks that the value exist in the enum
* `__toString()` You can `echo $myValue`, it will display the enum value (value of the constant)
* `getValue()` Returns the current value of the enum
* `isEqualTo()` Tests whether enum instances are equal (returns `true` if enum values are equal, `false` otherwise)

Static methods:
* `toArray()` method Returns all possible values as an array (constant name in key, constant value in value)

```php
use Myks92\ValueObjects\Enum\Enum;

/**
 * @method static Status wait()
 * @method static Status active()
 * @method static Status blocked()
 * 
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Status extends Enum
{
    private const WAIT = 'wait';
    private const ACTIVE = 'active';
    private const BLOCKED = 'blocked';

    /**
     * @return bool
     */
    public function isWait(): bool
    {
        return $this->getValue() === self::WAIT;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->getValue() === self::ACTIVE;
    }

    /**
     * @return bool
     */
    public function isBlocked(): bool
    {
        return $this->getValue() === self::BLOCKED;
    }
}

// Static method:
$status = Status::wait();
$status = Status::active();
$status = Status::blocked();
```

Static method helpers are implemented using [`__callStatic()`](https://www.php.net/manual/en/language.oop5)
.overloading.php#object.callstatic).

If you care about IDE autocompletion, you can either implement the static methods yourself:

```php
use Myks92\ValueObjects\Enum\Enum;
/**
 * @method static Status wait()
 * @method static Status active()
 * @method static Status blocked()
 */
class Status extends Enum
{
    private const WAIT = 'wait';
    private const ACTIVE = 'active';
    private const BLOCKED = 'blocked';
}
```