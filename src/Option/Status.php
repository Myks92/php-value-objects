<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Option;


use Myks92\ValueObjects\ValueObjectsInterface;
use Webmozart\Assert\Assert;

/**
 * Class Status
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Status implements ValueObjectsInterface
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
     * @param Status $status
     *
     * @return bool
     */
    public function isEqual(self $status): bool
    {
        return $this->getName() === $status->getName();
    }
}