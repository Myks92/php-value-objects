<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Security\Token;


use DateTimeImmutable;
use Myks92\ValueObjects\Security\Token;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Myks92\ValueObjects\Security\Token::isExpiredTo
 */
class ExpiresTest extends TestCase
{
    public function testNot(): void
    {
        $token = new Token($value = 'token', $expires = new DateTimeImmutable());

        self::assertFalse($token->isExpiredTo($expires->modify('-1 secs')));
        self::assertTrue($token->isExpiredTo($expires));
        self::assertTrue($token->isExpiredTo($expires->modify('+1 secs')));
    }
}