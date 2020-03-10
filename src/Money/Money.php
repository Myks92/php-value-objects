<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Money;


use InvalidArgumentException;
use Myks92\ValueObjects\ValueObjectsInterface;
use Webmozart\Assert\Assert;

/**
 * Class Money for job with money
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Money implements ValueObjectsInterface
{
    /**
     * Amount
     *
     * @var int
     */
    private int $amount;
    /**
     * Currency
     *
     * @var Currency
     */
    private Currency $currency;

    /**
     * @param int $amount
     * @param Currency $currency
     */
    public function __construct(int $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * Add an integer quantity to the amount and returns a new Money object.
     * Use a negative quantity for subtraction.
     *
     * @param int $quantity quantity to add
     *
     * @return Money
     */
    public function add(int $quantity): Money
    {
        $amount = $this->getAmount() + $quantity;
        return new static($amount, $this->getCurrency());
    }

    /**
     * @return int
     */
    public function getAmount(): int
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
        return (string)$this->getAmount() . ' ' . $this->getCurrency()->getCode();
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