# Option
This groups Value Objects use for popular options, which meet in more projects.

## Role
```php
use Myks92\ValueObjects\Option\Role;

$role = new Role('admin');
$role->getValue(); //admin
```

## Status
```php
use Myks92\ValueObjects\Option\Status;

$status = new Status('active');
$status->getValue(); //active
```

You can use self the advanced option with help [Enum](enum.md).