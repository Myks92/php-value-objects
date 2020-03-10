<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Option;


use Myks92\ValueObjects\ValueObjectInterface;
use Webmozart\Assert\Assert;

/**
 * Class Role
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Role implements ValueObjectInterface
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        Assert::notEmpty($name);
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Role $role
     *
     * @return bool
     */
    public function isEqual(self $role): bool
    {
        return $this->getName() === $role->getName();
    }
}