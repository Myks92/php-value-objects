<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Identity;


use InvalidArgumentException;
use Myks92\ValueObjects\Identity\Network;
use PHPUnit\Framework\TestCase;

class NetworkTest extends TestCase
{
    public function testSuccess(): void
    {
        $network = new Network($name = 'google', $identity = 'google-1');

        self::assertEquals($name, $network->getName());
        self::assertEquals($identity, $network->getIdentity());
    }

    public function testToString(): void
    {
        $network = new Network($name = 'google', $identity = 'google-1');

        self::assertEquals($name . ':' . $identity, $network);
    }

    public function testEqual(): void
    {
        $network = new Network($name = 'google', $identity = 'google-1');

        self::assertTrue($network->isEqualTo(new Network($name, 'google-1')));
        self::assertFalse($network->isEqualTo(new Network($name, 'google-2')));
        self::assertFalse($network->isEqualTo(new Network('vk', 'vk-1')));
    }

    public function testEmptyName(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Network($name = '', $identity = 'google-1');
    }

    public function testEmptyIdentity(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Network($name = 'google', $identity = '');
    }
}