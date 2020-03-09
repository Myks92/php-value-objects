<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Person;


use InvalidArgumentException;
use Myks92\ValueObjects\Person\Gender;
use PHPUnit\Framework\TestCase;

class GenderTest extends TestCase
{
    public function testSuccess(): void
    {
        $gender = new Gender($value = Gender::MALE);

        self::assertEquals($value, $gender->getValue());
        self::assertTrue($gender->isMale());
        self::assertFalse($gender->isFemale());
        self::assertFalse($gender->isOther());
    }

    public function testMale(): void
    {
        $gender = Gender::male();

        self::assertEquals(Gender::MALE, $gender->getValue());
        self::assertTrue($gender->isMale());
    }

    public function testFemale(): void
    {
        $gender = Gender::female();

        self::assertEquals(Gender::FEMALE, $gender->getValue());
        self::assertTrue($gender->isFemale());
    }

    public function testOther(): void
    {
        $gender = Gender::other();

        self::assertEquals(Gender::OTHER, $gender->getValue());
        self::assertTrue($gender->isOther());
    }

    public function testToString(): void
    {
        $gender = Gender::male();

        self::assertEquals(Gender::MALE, $gender);
    }

    public function testEqual(): void
    {
        $male = Gender::male();
        $female = Gender::female();

        self::assertTrue($male->isEqualTo($male));
        self::assertFalse($male->isEqualTo($female));
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Gender('none');
    }
}