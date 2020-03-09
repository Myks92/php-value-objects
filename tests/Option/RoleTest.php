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

        self::assertEquals($name, $role->getName());
    }

    public function testEqual(): void
    {
        $role = new Role($name = 'admin');

        self::assertTrue($role->isEqual($role));
        self::assertFalse($role->isEqual(new Role($name = 'admin2')));
    }

    public function testToString(): void
    {
        $role = new Role($name = 'admin');

        self::assertEquals($name, $role);
    }
}