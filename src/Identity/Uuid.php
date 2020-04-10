<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Identity;


use Exception;
use Myks92\ValueObjects\String\StringLiteral;
use Ramsey\Uuid\Uuid as UuidRamsey;
use Webmozart\Assert\Assert;

/**
 * Class Id
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Uuid extends StringLiteral
{
    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::uuid($value);
        parent::__construct(mb_strtolower($value));
    }

    /**
     * Generate UUID
     *
     * @return static
     * @throws Exception
     */
    public static function generate(): self
    {
        return new self(UuidRamsey::uuid4()->toString());
    }
}