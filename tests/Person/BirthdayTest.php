<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Person;


use DateTimeImmutable;
use Myks92\ValueObjects\Person\Age;
use Myks92\ValueObjects\Person\Birthday;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Myks92\ValueObjects\Person\Birthday
 */
class BirthdayTest extends TestCase
{
    public function testSuccess(): void
    {
        $now = new DateTimeImmutable();
        $birthday = new Birthday($date = new DateTimeImmutable('2011-01-01'));

        self::assertEquals($date, $birthday->getDate());
        self::assertEquals(new Age($now->diff($birthday->getDate())->y), $birthday->getAge());
    }

    public function testToString(): void
    {
        $birthday = new Birthday(new DateTimeImmutable('2011-01-01'));

        self::assertEquals('2011-01-01', $birthday);
    }

    public function testEqual(): void
    {
        $birthday = new Birthday(new DateTimeImmutable('2011-01-01'));
        $birthday2 = new Birthday(new DateTimeImmutable('2015-01-01')); //other

        self::assertTrue($birthday->isEqualTo($birthday));
        self::assertFalse($birthday->isEqualTo($birthday2));
    }

    public function testFuture(): void
    {
        $now = new DateTimeImmutable();

        $this->expectExceptionMessage('Is date from the future.');
        new Birthday($now->modify('+1 year'));
    }
}