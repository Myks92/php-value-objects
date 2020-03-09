<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Web;


use InvalidArgumentException;
use Myks92\ValueObjects\Web\File;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testSuccess(): void
    {
        $file = new File($path = '/', $name = '123.txt', $size = 1);

        self::assertEquals($path, $file->getPath());
        self::assertEquals($name, $file->getName());
        self::assertEquals($size, $file->getSize());
        self::assertEquals('txt', $file->getExtension());
    }

    public function testToString(): void
    {
        $file = new File($path = '/', $name = '123.txt', $size = 1);

        self::assertEquals($path . '/' . $name, $file);
    }

    public function testEqual(): void
    {
        $file = new File('/', '123.txt', 1);
        $file2 = new File('/', '1234.txt', 144);

        self::assertTrue($file->isEqualTo($file));
        self::assertFalse($file->isEqualTo($file2));
    }

    public function testEmptyPath(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new File($path = '', $name = '123.txt', $size = 1);
    }

    public function testEmptyName(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new File($path = '/', $name = '', $size = 1);
    }
}