<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Money;


use InvalidArgumentException;
use Webmozart\Assert\Assert;

/**
 * Class Money for job with money
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Money
{
    /**
     * Amount
     *
     * @var float
     */
    private float $amount;
    /**
     * Currency
     *
     * @var Currency
     */
    private Currency $currency;

    /**
     * @param float $amount
     * @param Currency $currency
     */
    public function __construct(float $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * Add an integer quantity to the amount and returns a new Money object.
     * Use a negative quantity for subtraction.
     *
     * @param float $quantity quantity to add
     *
     * @return Money
     */
    public function add(float $quantity): Money
    {
        $amount = $this->getAmount() + $quantity;
        return new static($amount, $this->getCurrency());
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * Represents the multiply value by the given factor
     *
     * @param float $multiplier
     *
     * @return Money
     */
    public function multiply(float $multiplier): Money
    {
        $amount = $this->getAmount() * $multiplier;
        return new static((int)$amount, $this->getCurrency());
    }

    /**
     * Represents the divided value by the given factor
     *
     * @param float divisor
     *
     * @return Money
     * @throws InvalidArgumentException In case divisor is zero.
     */
    public function divide(float $divisor): Money
    {
        Assert::greaterThan($divisor, 0);
        $amount = $this->getAmount() / $divisor;
        return new static((int)$amount, $this->getCurrency());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string)$this->getAmount() . ' ' . $this->getCurrency()->getValue();
    }

    /**
     * @param Money $money
     *
     * @return bool
     */
    public function isEqualTo(self $money): bool
    {
        return $this->getAmount() === $money->getAmount() && $this->getCurrency() === $money->getCurrency();
    }
}