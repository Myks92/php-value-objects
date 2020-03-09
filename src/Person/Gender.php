<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Person;


use Myks92\ValueObjects\StringValueObjects;
use Webmozart\Assert\Assert;

/**
 * Class Gender
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Gender extends StringValueObjects
{
    /**
     * @var string value for male
     */
    public const MALE = 'male';
    /**
     * @var string value for female
     */
    public const FEMALE = 'female';
    /**
     * @var string value for other
     */
    public const OTHER = 'other';

    /**
     * @var string
     */
    public string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::oneOf($value, [
            self::MALE,
            self::FEMALE,
            self::OTHER
        ]);
        parent::__construct($value);
    }

    /**
     * Create male
     *
     * @return static
     */
    public static function male(): self
    {
        return new self(self::MALE);
    }

    /**
     * Create female
     *
     * @return static
     */
    public static function female(): self
    {
        return new self(self::FEMALE);
    }

    /**
     * Create other
     *
     * @return static
     */
    public static function other(): self
    {
        return new self(self::OTHER);
    }

    /**
     * @return bool
     */
    public function isMale(): bool
    {
        return $this->getValue() === self::MALE;
    }

    /**
     * @return bool
     */
    public function isFemale(): bool
    {
        return $this->getValue() === self::FEMALE;
    }

    /**
     * @return bool
     */
    public function isOther(): bool
    {
        return $this->getValue() === self::OTHER;
    }
}