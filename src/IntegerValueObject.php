<?php

declare(strict_types=1);


namespace Myks92\ValueObjects;


/**
 * Class IntegerValueObject
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
abstract class IntegerValueObject implements ValueObjectInterface
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
     * @param IntegerValueObject $value
     *
     * @return bool
     */
    public function isEqualTo(self $value): bool
    {
        return $this->getValue() === $value->getValue();
    }
}