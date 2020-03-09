# Security

## Token

```php
use Myks92\ValueObjects\Security\Token;

$token = new Token('token', $expires = new DateTimeImmutable());

$token->getValue(); //token
$token->getExpires(); //date expires

//Expires
$token->isExpiredTo($expires->modify('-1 secs')); //false
$token->isExpiredTo($expires->modify('+1 secs')); //true

//Validate
$token->validate('token', $expires->modify('-1 secs')); //Exception "Token is invalid.'
$token->validate('token', $expires->modify('+1 secs')); //Exception "Token is expired.'
```