<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Money;


use InvalidArgumentException;
use Myks92\ValueObjects\Money\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testSuccess(): void
    {
        $currency = new Currency($code = 'USD');

        self::assertEquals($code, $currency->getCode());
        self::assertIsArray($currency->toArray());
    }

    public function testEqual(): void
    {
        $code = 'USD';

        $currency = new Currency($code);
        $currency2 = new Currency('EUR'); //other

        self::assertTrue($currency->isEqualTo($currency));
        self::assertFalse($currency->isEqualTo($currency2));
    }

    public function testToString(): void
    {
        $currency = new Currency($code = 'USD');

        self::assertEquals($code, $currency);
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Currency('NON');
    }
}