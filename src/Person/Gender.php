<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Person;


use Myks92\ValueObjects\Enum\Enum;
use ReflectionException;

/**
 * Class Gender
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Gender extends Enum
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
     * Create male
     *
     * @return static
     * @throws ReflectionException
     */
    public static function male(): self
    {
        return new self(self::MALE);
    }

    /**
     * Create female
     *
     * @return static
     * @throws ReflectionException
     */
    public static function female(): self
    {
        return new self(self::FEMALE);
    }

    /**
     * Create other
     *
     * @return static
     * @throws ReflectionException
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