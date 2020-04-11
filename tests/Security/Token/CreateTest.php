<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Security\Token;


use DateTimeImmutable;
use InvalidArgumentException;
use Myks92\ValueObjects\Security\Token;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    public function testSuccess(): void
    {
        $token = new Token($value = 'token', $expires = new DateTimeImmutable());

        self::assertEquals($value, $token->getValue());
        self::assertEquals($expires, $token->getExpires());
    }

    public function testToString(): void
    {
        $token = new Token($value = 'token', $expires = new DateTimeImmutable());

        self::assertEquals($value, $token);
    }

    public function testCase(): void
    {
        $value = 'token';

        $token = new Token(mb_strtoupper($value), new DateTimeImmutable());

        self::assertEquals($value, $token->getValue());
    }

    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Token('', new DateTimeImmutable());
    }
}