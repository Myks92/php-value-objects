<?php
declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\String;


use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Myks92\ValueObjects\String\StringLiteral
 */
class StringTest extends TestCase
{
    public function testSuccess(): void
    {
        $string = new TestString($value = 'string');

        self::assertEquals($value, $string->getValue());
    }

    public function testToString(): void
    {
        $string = new TestString($value = 'string');

        self::assertEquals($value, $string);
    }

    public function testInvalidEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new TestString('');
    }

    public function testEquals()
    {
        $one = new TestString('string 1');
        $two = new TestString('string 2');

        $this->assertTrue($one->isEqualTo($one));
        $this->assertFalse($one->isEqualTo($two));
    }
}