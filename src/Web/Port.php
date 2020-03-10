<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Web;


use Myks92\ValueObjects\Number\IntegerValueObject;
use Webmozart\Assert\Assert;

/**
 * Class Port
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Port extends IntegerValueObject
{
    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        Assert::range($value, 0, 65535);
        parent::__construct($value);
    }
}