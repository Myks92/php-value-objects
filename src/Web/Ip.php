<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Web;


use Myks92\ValueObjects\StringValueObjects;
use Webmozart\Assert\Assert;

/**
 * Class Ip
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Ip extends StringValueObjects
{
    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::ip($value);
        parent::__construct($value);
    }
}