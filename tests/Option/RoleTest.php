<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Option;


use Myks92\ValueObjects\Option\Role;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{
    public function testSuccess(): void
    {
        $role = new Role($name = 'admin');

        self::assertEquals($name, $role->getValue());
    }

    public function testEqual(): void
    {
        $role = new Role($name = 'admin');

        self::assertTrue($role->isEqualTo($role));
        self::assertFalse($role->isEqualTo(new Role($name = 'admin2')));
    }

    public function testToString(): void
    {
        $role = new Role($name = 'admin');

        self::assertEquals($name, $role);
    }
}