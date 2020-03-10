<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Identity;


use Exception;
use Myks92\ValueObjects\StringValueObject;
use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

/**
 * Class Id
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Id extends StringValueObject
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
        return new self(Uuid::uuid4()->toString());
    }
}