<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\String;


use Myks92\ValueObjects\ValueObjectInterface;
use Webmozart\Assert\Assert;

/**
 * Class StringLiteral
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
abstract class StringLiteral implements ValueObjectInterface
{
    /**
     * @var string
     */
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::notEmpty($value);
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param StringLiteral $value
     *
     * @return bool
     */
    public function isEqualTo(self $value): bool
    {
        return $this->getValue() === $value->getValue();
    }
}