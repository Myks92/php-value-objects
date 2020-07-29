<?php
declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Number;


use PHPUnit\Framework\TestCase;

/**
 * @covers \Myks92\ValueObjects\Number\Integer
 */
class IntegerTest extends TestCase
{
    public function testSuccess(): void
    {
        $integer = new TestInteger($value = 1);

        self::assertEquals($value, $integer->getValue());
    }

    public function testToString(): void
    {
        $integer = new TestInteger($value = 1);

        self::assertEquals((string)$value, $integer);
    }

    public function testEquals()
    {
        $one = new TestInteger(1);
        $two = new TestInteger(2);

        $this->assertTrue($one->isEqualTo($one));
        $this->assertFalse($one->isEqualTo($two));
    }
}