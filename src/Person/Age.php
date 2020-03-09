<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Person;


use Myks92\ValueObjects\IntegerValueObjects;
use Webmozart\Assert\Assert;

/**
 * Class Age
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Age extends IntegerValueObjects
{
    /**
     * @var string min value age
     */
    const MIN_VALUE = 1;
    /**
     * @var string max value age
     */
    const MAX_VALUE = 180;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        Assert::range($value, self::MIN_VALUE, self::MAX_VALUE);
        parent::__construct($value);
    }
}