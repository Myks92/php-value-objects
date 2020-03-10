<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Identity;


use Myks92\ValueObjects\ValueObjectInterface;
use Webmozart\Assert\Assert;

/**
 * Class Phone
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Phone implements ValueObjectInterface
{
    public const PATTERN_COUNTRY = "/^[0-9]{1,3}$/";
    public const PATTERN_NUMBER = "/^[0-9]{10}$/";
    /**
     * Country
     *
     * @var int
     */
    private int $country;
    /**
     * Number
     *
     * @var string
     */
    private string $number;

    /**
     * @param int $country
     * @param string $number
     */
    public function __construct(int $country, string $number)
    {
        Assert::regex($country, self::PATTERN_COUNTRY);
        Assert::regex($number, self::PATTERN_NUMBER);
        $this->country = $country;
        $this->number = $number;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string)$this->getFull();
    }

    /**
     * @return string
     */
    public function getFull(): string
    {
        return $this->getCountry() . $this->getNumber();
    }

    /**
     * @return int
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param Phone $phone
     *
     * @return bool
     */
    public function isEqualTo(self $phone): bool
    {
        return $this->getFull() === $phone->getFull();
    }
}