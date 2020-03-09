<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Person;


use InvalidArgumentException;
use Myks92\ValueObjects\Person\Name;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    public function testSuccess(): void
    {
        $name = new Name($last = 'Last', $first = 'First', $middle = 'Middle');

        self::assertEquals($last, $name->getLast());
        self::assertEquals($first, $name->getFirst());
        self::assertEquals($middle, $name->getMiddle());
        self::assertEquals($last . ' ' . $first . ' ' . $middle, $name->getFull());
    }

    public function testToString(): void
    {
        $name = new Name($last = 'Last', $first = 'First', $middle = 'Middle');

        self::assertEquals($name, $name->getFull());
    }

    public function testEmptyLast(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name('', 'First');
    }

    public function testEmptyFirst(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name('Last', '');
    }
}