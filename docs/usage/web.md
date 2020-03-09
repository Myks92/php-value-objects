# Web Object Values

## File

```php
use Myks92\ValueObjects\Web\File;

$file = new File('demo', '123.txt', 1);
$file->getPath(); //demo
$file->getName(); //123.txt
$file->getSize(); //1
$file->getExtension(); //.txt

$file2 = new File('demo', '1234.txt', 150);
$file->isEqualTo($file2); //false
```

## Ip

```php
use Myks92\ValueObjects\Web\Ip;

$ip = new Ip('127.0.0.1');
$ip->getValue(); //127.0.0.1

$ip->isEqualTo(new Ip('127.0.0.2')); //false
```

## Port

```php
use Myks92\ValueObjects\Web\Port;

$port = new Port(80);
$port->getValue(); //80

$port->isEqualTo(new Port(80)); //true
```

## Url

```php
use Myks92\ValueObjects\Web\Url;

$url = new Url('http://site.ru');
$url->getValue(); //http://site.ru

$url->isEqualTo(new Url('http://site.ru')); //true
```