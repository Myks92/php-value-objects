# Identity
This groups Value Objects use for identity, e.g. for auth to users in your project. Or for another Entities.

## Email
```php
use Myks92\ValueObjects\Identity\Email;

$email = new Email('email@app.test');
$email->getValue(); //email@app.test
$email->getLocal(); //email
$email->getDomain(); //app.test

$email->isEqualTo(new Email('email-other@app.test')); //false
```

## Phone
```php
use Myks92\ValueObjects\Identity\Phone;

$phone = new Phone(7, '9995552233');
$phone->getCountry(); //7
$phone->getNumber(); //9995552233
$phone->getFull(); //79995552233

$phone->isEqualTo(new Phone(7, '9997772233')); //false
```

## Network
```php
use Myks92\ValueObjects\Identity\Network;

$network = new Network('vk', '1000023');
$network->getName(); //vk
$network->getIdentity(); //1000023

$network->isEqualTo(new Network('vk', '11123')); //false
```

## Username
```php
use Myks92\ValueObjects\Identity\Username;

$network = new Username('myks92');
$network->getValue(); //myks92

$network->isEqualTo(new Username('other')); //false
```