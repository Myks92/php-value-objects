# Option

## Role

### Basic example
```php
use Myks92\ValueObjects\Option\Role;

$role = new Role('admin');
$role->getName(); //admin
```

### Extended example
```php
use Myks92\ValueObjects\Option\Role as BaseRole;
use Webmozart\Assert\Assert;

class Role extends BaseRole
{
    public const USER = 'ROLE_USER';
    public const ADMIN = 'ROLE_ADMIN';

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        Assert::oneOf($name,[
            self::USER,
            self::ADMIN
        ]);
        parent::__construct($name);
    }

    /**
     * @return static
     */
    public static function user(): self
    {
        return new self(self::USER);
    }

    /**
     * @return static
     */
    public static function admin(): self
    {
        return new self(self::ADMIN);
    }

    /**
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->getName() === self::USER;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->getName() === self::ADMIN;
    }
}
```

## Status

### Basic example
```php
use Myks92\ValueObjects\Option\Status;

$status = new Status('active');
$status->getName(); //active
```
### Extended example

```php
use Myks92\ValueObjects\Option\Status as BaseStatus;
use Webmozart\Assert\Assert;

class Status extends BaseStatus
{
    public const WAIT = 'wait';
    public const ACTIVE = 'active';
    public const BLOCKED = 'blocked';

    /**
     * @var string
     */
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        Assert::oneOf($name,[
            self::WAIT,
            self::ACTIVE,
            self::BLOCKED
        ]);
        parent::__construct($name);
    }

    /**
     * @return static
     */
    public static function wait(): self
    {
        return new self(self::WAIT);
    }

    /**
     * @return static
     */
    public static function active(): self
    {
        return new self(self::ACTIVE);
    }

    /**
     * @return static
     */
    public static function blocked(): self
    {
        return new self(self::BLOCKED);
    }

    /**
     * @return bool
     */
    public function isWait(): bool
    {
        return $this->name === self::WAIT;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->name === self::ACTIVE;
    }

    /**
     * @return bool
     */
    public function isBlocked(): bool
    {
        return $this->getName() === self::BLOCKED;
    }
}
```