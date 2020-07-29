<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Web;


use InvalidArgumentException;
use Myks92\ValueObjects\Web\Port;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Myks92\ValueObjects\Web\Port
 */
class PortTest extends TestCase
{
    public function testSuccess(): void
    {
        $port = new Port($value = 1);

        self::assertEquals($value, $port->getValue());
    }

    public function testToString(): void
    {
        $port = new Port($value = 1);

        self::assertEquals((string)$value, $port);
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Port(-1);

        $this->expectException(InvalidArgumentException::class);
        new Port(65536);
    }

    public function testEqual(): void
    {
        $port = new Port(1);
        $port2 = new Port(255); //other

        self::assertTrue($port->isEqualTo($port));
        self::assertFalse($port->isEqualTo($port2));
    }
}