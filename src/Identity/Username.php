<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Identity;


use Myks92\ValueObjects\String\StringLiteral;
use Webmozart\Assert\Assert;

/**
 * Class Username
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Username extends StringLiteral
{
    public const PATTERN_USERNAME = '/^([A-Za-z0-9]{5,31})$/';

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::regex($value, self::PATTERN_USERNAME);
        parent::__construct($value);
    }
}