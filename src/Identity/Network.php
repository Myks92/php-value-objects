<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Identity;


use Webmozart\Assert\Assert;

/**
 * Class Network
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Network
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $identity;

    /**
     * @param string $name
     * @param string $identity
     */
    public function __construct(string $name, string $identity)
    {
        Assert::notEmpty($name);
        Assert::notEmpty($identity);
        $this->name = mb_strtolower($name);
        $this->identity = mb_strtolower($identity);
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getName() . ':' . $this->getIdentity();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }

    /**
     * @param Network $network
     *
     * @return bool
     */
    public function isEqualTo(self $network): bool
    {
        return $this->getName() === $network->getName() && $this->getIdentity() === $network->getIdentity();
    }
}