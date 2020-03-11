<?php
declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Enum;


use Myks92\ValueObjects\Enum\Enum;

/**
 * @method static TestEnum string()
 * @method static TestEnum integer()
 * @method static TestEnum camelCase()
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class TestEnum extends Enum
{
    public const STRING = 'string';
    public const CAMEL_CASE = 'camel-case';
    public const INTEGER = 42;
}