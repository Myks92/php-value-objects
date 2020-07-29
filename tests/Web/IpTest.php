<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Web;


use InvalidArgumentException;
use Myks92\ValueObjects\Web\Ip;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Myks92\ValueObjects\Web\Ip
 */
class IpTest extends TestCase
{
    public function testSuccess(): void
    {
        $ip = new Ip($value = '127.0.0.1');

        self::assertEquals($value, $ip->getValue());
    }

    public function testToString(): void
    {
        $ip = new Ip($value = '127.0.0.1');

        self::assertEquals((string)$value, $ip);
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Ip('266.266.266.266');
    }

    public function testEqual(): void
    {
        $ip = new Ip('127.0.0.1');
        $ip2 = new Ip('127.0.0.2'); //other

        self::assertTrue($ip->isEqualTo($ip));
        self::assertFalse($ip->isEqualTo($ip2));
    }
}