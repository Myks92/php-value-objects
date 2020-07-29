<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Person;


use InvalidArgumentException;
use Myks92\ValueObjects\Person\Age;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Myks92\ValueObjects\Person\Age
 */
class AgeTest extends TestCase
{
    public function testSuccess(): void
    {
        $age = new Age($value = 12);

        self::assertEquals($value, $age->getValue());
    }

    public function testToString(): void
    {
        $age = new Age($value = 12);

        self::assertEquals((string)$value, $age);
    }

    public function testEqual(): void
    {
        $age = new Age($value = 12);
        $age2 = new Age($value = 15); //other

        self::assertTrue($age->isEqualTo($age));
        self::assertFalse($age->isEqualTo($age2));
    }

    public function testZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Age($value = 0);
    }

    public function testMin(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Age($value = -10);
    }

    public function testMax(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Age($value = 181);
    }
}