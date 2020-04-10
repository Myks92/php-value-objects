# Person
This groups Value Objects use for person, e.g. for employees, or for any other person in your projects.

## Birthday
```php
use Myks92\ValueObjects\Person\Birthday;

$birthday = new Birthday(new DateTimeImmutable('2011-01-01'));
$birthday->getAge(); //get Age::class
$birthday->getDate()->format('Y-m-d'); //2011-01-01
```

## Age
```php
use Myks92\ValueObjects\Person\Age;

$birthday = new Age(12);
$birthday->getValue(); //12
```