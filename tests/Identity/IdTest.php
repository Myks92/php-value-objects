<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Identity;


use Exception;
use InvalidArgumentException;
use Myks92\ValueObjects\Identity\Id;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class IdTest extends TestCase
{
    public function testSuccess(): void
    {
        $id = $this->createId($value = Uuid::uuid4()->toString());

        self::assertEquals($value, $id->getValue());
    }

    public function testCase(): void
    {
        $value = Uuid::uuid4()->toString();
        $id = $this->createId(mb_strtoupper($value));

        self::assertEquals($value, $id->getValue());
    }

    public function testGenerate(): void
    {
        $id = Id::generate();

        self::assertNotEmpty($id->getValue());
    }

    public function testToString(): void
    {
        $id = $this->createId($value = Uuid::uuid4()->toString());

        self::assertEquals($value, $id);
    }

    public function testEqual(): void
    {
        $id = $this->createId();
        $id2 = Id::generate(); //other

        self::assertTrue($id->isEqualTo($id));
        self::assertFalse($id->isEqualTo($id2));
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Id('not-uuid');
    }

    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Id('');
    }

    /**
     * @param $value
     *
     * @return Id
     * @throws Exception
     */
    private function createId($value = null): Id
    {
        if (null === $value) {
            $value = Uuid::uuid4()->toString();
        }
        return new Id($value);
    }
}