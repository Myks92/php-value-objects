# Identity

## Id

```php
use Myks92\ValueObjects\Identity\Id;
use Ramsey\Uuid\Uuid;

$id = new Id(Uuid::uuid4()->toString());
$id->getValue(); //UUID4
$id->isEqualTo(new Id(Uuid::uuid4()->toString())); //false
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