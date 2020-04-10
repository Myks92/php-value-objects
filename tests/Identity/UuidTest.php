<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Identity;


use Exception;
use InvalidArgumentException;
use Myks92\ValueObjects\Identity\Uuid;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid as UuidRamsey;

class UuidTest extends TestCase
{
    public function testSuccess(): void
    {
        $id = $this->createId($value = UuidRamsey::uuid4()->toString());

        self::assertEquals($value, $id->getValue());
    }

    public function testCase(): void
    {
        $value = UuidRamsey::uuid4()->toString();
        $id = $this->createId(mb_strtoupper($value));

        self::assertEquals($value, $id->getValue());
    }

    public function testGenerate(): void
    {
        $id = Uuid::generate();

        self::assertNotEmpty($id->getValue());
    }

    public function testToString(): void
    {
        $id = $this->createId($value = UuidRamsey::uuid4()->toString());

        self::assertEquals($value, $id);
    }

    public function testEqual(): void
    {
        $id = $this->createId();
        $id2 = Uuid::generate(); //other

        self::assertTrue($id->isEqualTo($id));
        self::assertFalse($id->isEqualTo($id2));
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Uuid('not-uuid');
    }

    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Uuid('');
    }

    /**
     * @param $value
     *
     * @return Uuid
     * @throws Exception
     */
    private function createId($value = null): Uuid
    {
        if (null === $value) {
            $value = UuidRamsey::uuid4()->toString();
        }
        return new Uuid($value);
    }
}