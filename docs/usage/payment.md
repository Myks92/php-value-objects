# Payment
This groups Value Objects use for work with payments.

## Payment
```php
use Myks92\ValueObjects\Payment\Payment;

$payment = new Payment('pay-pal', 'success');
$payment->getMethod(); //pay-pal
$payment->getStatus(); //success
```