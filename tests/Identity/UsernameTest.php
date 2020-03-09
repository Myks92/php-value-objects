<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Identity;


use InvalidArgumentException;
use Myks92\ValueObjects\Identity\Username;
use PHPUnit\Framework\TestCase;

class UsernameTest extends TestCase
{
    public function testSuccess(): void
    {
        $username = new Username($value = 'name1');

        self::assertEquals($value, $username->getValue());
    }

    public function testToString(): void
    {
        $username = new Username($value = 'name1');

        self::assertEquals($value, $username);
    }

    public function testEqual(): void
    {
        $username = new Username($value = 'name1');
        $username2 = new Username($value = 'name2'); //other

        self::assertTrue($username->isEqualTo($username));
        self::assertFalse($username->isEqualTo($username2));
    }

    public function testIncorrectLatin(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Username('фыв');
    }

    public function testShort(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Username('s');
    }

    public function testLong(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Username('looooooooooooooooooooooooooooooog');
    }

    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Username('');
    }
}