<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Option;


use Myks92\ValueObjects\Option\Status;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testSuccess(): void
    {
        $status = new Status($name = 'active');

        self::assertEquals($name, $status->getName());
    }

    public function testEqual(): void
    {
        $status = new Status($name = 'admin');

        self::assertTrue($status->isEqual($status));
        self::assertFalse($status->isEqual(new Status($name = 'admin2')));
    }

    public function testToString(): void
    {
        $status = new Status($name = 'active');

        self::assertEquals($name, $status);
    }
}