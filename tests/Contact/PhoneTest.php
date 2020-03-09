<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Contact;


use InvalidArgumentException;
use Myks92\ValueObjects\Contact\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testSuccess(): void
    {
        $phone = $this->createPhone($country = 7, $number = '9995552233');

        self::assertEquals($country, $phone->getCountry());
        self::assertEquals($number, $phone->getNumber());
        self::assertEquals($country . $number, $phone->getFull());
    }

    public function testToString(): void
    {
        $phone = $this->createPhone($country = 7, $number = '9995552233');

        self::assertEquals($country . $number, $phone);
    }

    public function testEqual(): void
    {
        $number = '9995552233';

        $phone = new Phone(7, $number);
        $phone2 = new Phone(98, $number);

        self::assertTrue($phone->isEqualTo($phone));
        self::assertFalse($phone->isEqualTo($phone2));
    }

    public function testNegativeCountry(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone($country = -7, $number = '9995552233');
    }

    public function testCountryLengthMax(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone($country = 3333, $number = '9995552233');
    }

    public function testNumberLengthMin(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone($country = 7, $number = '999555223');
    }

    public function testNumberLengthMax(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone($country = 7, $number = '99955522331');
    }

    /**
     * @param int $country
     * @param string $number
     *
     * @return Phone
     */
    private function createPhone($country = 7, $number = '9995552233'): Phone
    {
        return new Phone($country, $number);
    }
}