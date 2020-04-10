<?php

declare(strict_types=1);

namespace Myks92\ValueObjects\Number;


/**
 * Class Integer
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
abstract class Integer
{
    /**
     * @var int
     */
    private int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string)$this->getValue();
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param Integer $value
     *
     * @return bool
     */
    public function isEqualTo(self $value): bool
    {
        return $this->getValue() === $value->getValue();
    }
}