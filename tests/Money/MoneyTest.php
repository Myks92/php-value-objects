<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Money;


use InvalidArgumentException;
use Myks92\ValueObjects\Money\Currency;
use Myks92\ValueObjects\Money\Money;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class MoneyTest extends TestCase
{
    public function testSuccess(): void
    {
        $money = new Money($amount = 100, $currency = $this->createCurrency());

        self::assertEquals($amount, $money->getAmount());
        self::assertEquals($currency, $money->getCurrency());
    }

    public function testToString(): void
    {
        $money = new Money($amount = 100, $currency = $this->createCurrency());

        self::assertEquals($amount . ' ' . $currency->getValue(), $money);
    }

    public function testEqual(): void
    {
        $currency = $this->createCurrency();

        $money = new Money(100, $currency);
        $money2 = new Money(200, $currency); //other

        self::assertTrue($money->isEqualTo($money));
        self::assertFalse($money->isEqualTo($money2));
    }

    public function testAddPositive(): void
    {
        $money = new Money(10, $this->createCurrency());
        $money = $money->add(10);

        self::assertEquals(20, $money->getAmount());
    }

    public function testAddNegative(): void
    {
        $money = new Money(100, $this->createCurrency());
        $money = $money->add(-10);

        self::assertEquals(90, $money->getAmount());
    }

    public function testMultiply(): void
    {
        $money = new Money(1200, $this->createCurrency());
        $money = $money->multiply(1.2);

        self::assertEquals(1440, $money->getAmount());
    }

    public function testMultiplyInverse(): void
    {
        $money = new Money(1200, $this->createCurrency());
        $money = $money->multiply(0.3);

        self::assertEquals(360, $money->getAmount());
    }

    public function testDivide(): void
    {
        $money = new Money(1200, $this->createCurrency());
        $money = $money->divide(1.2);

        self::assertEquals(1000, $money->getAmount());
    }

    public function testDivideInverse(): void
    {
        $money = new Money(1200, $this->createCurrency());
        $money = $money->divide(0.3);

        self::assertEquals(4000, $money->getAmount());
    }

    public function testDivideZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $money = new Money(1200, $this->createCurrency());
        $money->divide(0);
    }

    /**
     * @param string $code
     *
     * @return Currency
     * @throws ReflectionException
     */
    private function createCurrency($code = 'USD'): Currency
    {
        return new Currency($code);
    }
}