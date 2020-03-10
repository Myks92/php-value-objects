<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Web;


use InvalidArgumentException;
use Myks92\ValueObjects\StringValueObjects;

/**
 * Class Url
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Url extends StringValueObjects
{
    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('Invalid Url.');
        }
        parent::__construct($value);
    }
}