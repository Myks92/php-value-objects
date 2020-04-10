<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Web;


use Myks92\ValueObjects\String\StringLiteral;
use Webmozart\Assert\Assert;

/**
 * Class Ip
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Ip extends StringLiteral
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