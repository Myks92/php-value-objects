<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Security\Token;


use DateTimeImmutable;
use Myks92\ValueObjects\Security\Token;
use PHPUnit\Framework\TestCase;

class ValidateTest extends TestCase
{
    public function testSuccess(): void
    {
        $token = new Token($value = 'token', $expires = new DateTimeImmutable());

        $token->validate($value, $expires->modify('-1 secs'));

        self::assertEquals($value, $token->getValue());
        self::assertEquals($expires, $token->getExpires());
    }

    public function testWrong(): void
    {
        $token = new Token($value = 'token', $expires = new DateTimeImmutable());

        $this->expectExceptionMessage('Token is invalid.');
        $token->validate('token2', $expires->modify('-1 secs'));
    }

    public function testExpired(): void
    {
        $token = new Token($value = 'token', $expires = new DateTimeImmutable());

        $this->expectExceptionMessage('Token is expired.');
        $token->validate($value, $expires->modify('+1 secs'));
    }
}