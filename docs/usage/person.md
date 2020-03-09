# Person

## Birthday

```php
use Myks92\ValueObjects\Person\Birthday;

$birthday = new Birthday(new DateTimeImmutable('2011-01-01'));
$birthday->getAge(new DateTimeImmutable()); //get Age::class
$birthday->getDate()->format('Y-m-d'); //2011-01-01
```

## Age

```php
use Myks92\ValueObjects\Person\Birthday;

$birthday = new Birthday(new DateTimeImmutable('2011-01-01'));
$birthday->getAge(); //get age...
$birthday->getDate()->format('Y-m-d'); //2011-01-01
```

## Gender

```php
use Myks92\ValueObjects\Person\Gender;

$gender = new Gender('male');
$gender->getValue(); //male
$gender->isMale(); //true
$gender->isFemale(); //false
$gender->isOther(); //false

$gender->isEqualTo(new Gender('female')); //false
```

Factory create

```php
use Myks92\ValueObjects\Person\Gender;

Gender::male()->getValue(); //male
Gender::female()->getValue(); //female
Gender::other()->getValue(); //other
```

## Name

```php
use Myks92\ValueObjects\Person\Name;

$name = new Name('Last', 'First', 'Middle');

$name->getLast(); //Last
$name->getLast(); //First
$name->getMiddle(); //Middle

$name->getFull(); //Last First Middle
$name->getFull(', '); //Last, First, Middle
```

## Position

```php
use Myks92\ValueObjects\Person\Position;

$position = new Position('Developer');
$position->getValue(); //Developer

$position->isEqualTo(new Position('Developer Other')); //false
```