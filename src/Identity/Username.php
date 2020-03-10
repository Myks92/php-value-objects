<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Identity;


use Myks92\ValueObjects\StringValueObjects;
use Webmozart\Assert\Assert;

/**
 * Class Username
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Username extends StringValueObjects
{
    private const USERNAME_REGEX = '/^([A-Za-z0-9]{5,31})$/';

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::regex($value, self::USERNAME_REGEX);
        parent::__construct($value);
    }
}