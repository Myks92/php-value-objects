# Money

## Currency

For job with currency

```php
use Myks92\ValueObjects\Money\Currency;

$currency = new Currency('USD');
$currency->getValue(); //USD
$currency->isEqualTo(new Currency('RUB')); //false
```

## Money

For job with money

### Basic

```php
use Myks92\ValueObjects\Money\Money;
use Myks92\ValueObjects\Money\Currency;

$currency = new Currency('USD');
$money = new Money(100, $currency);

$money->getAmount(); //100
$money->getCurrency()->getValue(); //USD
```

### Calculations

The Money Value object has embedded calculation methods.

#### Add

Add an integer quantity to the amount and returns a new Money object. Use a negative quantity for subtraction.
     
```php
use Myks92\ValueObjects\Money\Money;
use Myks92\ValueObjects\Money\Currency;

$currency = new Currency('USD');
$money = new Money(1200, $currency);

$money->add(100); //1300
$money->add(-100); //1200
```

#### Multiply

Represents the multiply value by the given factor

```php
use Myks92\ValueObjects\Money\Money;
use Myks92\ValueObjects\Money\Currency;

$currency = new Currency('USD');

$money = new Money(1200, $currency);
$money->multiply(1.2); //1440

$money = new Money(1200, $currency);
$money->multiply(0.3); //360
```

#### Divide

Represents the divided value by the given factor
```php
use Myks92\ValueObjects\Money\Money;
use Myks92\ValueObjects\Money\Currency;

$currency = new Currency('USD');

$money = new Money(1200, $currency);
$money->divide(1.2); //1000

$money = new Money(1200, $currency);
$money->multiply(0.3); //4000
```