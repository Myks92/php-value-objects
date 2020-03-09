<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Security\Token;


use DateTimeImmutable;
use Myks92\ValueObjects\Security\Token;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class ValidateTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testSuccess(): void
    {
        $token = new Token($value = Uuid::uuid4()->toString(), $expires = new DateTimeImmutable());

        $token->validate($value, $expires->modify('-1 secs'));
    }

    public function testWrong(): void
    {
        $token = new Token($value = Uuid::uuid4()->toString(), $expires = new DateTimeImmutable());

        $this->expectExceptionMessage('Token is invalid.');
        $token->validate(Uuid::uuid4()->toString(), $expires->modify('-1 secs'));
    }

    public function testExpired(): void
    {
        $token = new Token($value = Uuid::uuid4()->toString(), $expires = new DateTimeImmutable());

        $this->expectExceptionMessage('Token is expired.');
        $token->validate($value, $expires->modify('+1 secs'));
    }
}