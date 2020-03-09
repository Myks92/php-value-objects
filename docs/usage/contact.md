# Contact

## Email

```php
use Myks92\ValueObjects\Contact\Email;

$email = new Email('email@app.test');
$email->getValue(); //email@app.test
$email->getLocal(); //email
$email->getDomain(); //app.test

$email->isEqualTo(new Email('email-other@app.test')); //false
```

## Phone

```php
use Myks92\ValueObjects\Contact\Phone;

$phone = new Phone(7, '9995552233');
$phone->getCountry(); //7
$phone->getNumber(); //9995552233
$phone->getFull(); //79995552233

$phone->isEqualTo(new Phone(7, '9997772233')); //false
```