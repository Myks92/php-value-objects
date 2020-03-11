<?php
declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Enum;


use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EnumTest extends TestCase
{
    public function testSuccessString(): void
    {
        $enum = new TestEnum(TestEnum::STRING);

        self::assertEquals(TestEnum::STRING, $enum->getValue());
    }

    public function testSuccessInteger(): void
    {
        $enum = new TestEnum(TestEnum::INTEGER);

        self::assertEquals(TestEnum::INTEGER, $enum->getValue());
    }

    public function testToString(): void
    {
        $enum = new TestEnum(TestEnum::INTEGER);

        self::assertEquals((string)TestEnum::INTEGER, $enum);
    }

    public function testInvalidBoolean(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new TestEnum(false);

        $this->expectException(InvalidArgumentException::class);
        new TestEnum(true);
    }

    public function testInvalidEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new TestEnum('');
    }

    public function testInvalidNull(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new TestEnum(null);
    }

    public function testInvalidZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new TestEnum(0);
    }

    /**
     * __callStatic()
     */
    public function testSuccessStaticAccess()
    {
        self::assertEquals(new TestEnum(TestEnum::STRING), TestEnum::string());
        self::assertEquals(new TestEnum(TestEnum::INTEGER), TestEnum::integer());
        self::assertEquals(new TestEnum(TestEnum::CAMEL_CASE), TestEnum::camelCase());
    }

    /**
     * __callStatic()
     */
    public function testInvalidStaticAccess()
    {
        $this->expectExceptionMessage('No static method or enum constant \'UNKNOWN\' in class Myks92\ValueObjects\Tests\Enum\TestEnum');
        TestEnum::unknown();
    }

    public function testEquals()
    {
        $string = new TestEnum(TestEnum::STRING);
        $integer = new TestEnum(TestEnum::INTEGER);

        $this->assertTrue($string->isEqualTo($string));
        $this->assertFalse($string->isEqualTo($integer));
    }
}