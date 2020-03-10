<?php
declare(strict_types=1);


namespace Myks92\ValueObjects\Enum;


use Myks92\ValueObjects\ValueObjectInterface;
use ReflectionClass;
use ReflectionException;
use Webmozart\Assert\Assert;

/**
 * Base Enum class
 *
 * Create an enum by implementing this class and adding class constants.
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
abstract class Enum implements ValueObjectInterface
{
    /**
     * Store existing constants in a static cache per object.
     *
     * @var array
     */
    protected static array $cache = [];
    /**
     * Enum value
     *
     * @var mixed
     */
    protected $value;

    /**
     * Creates a new value of some type
     *
     * @param mixed $value
     *
     * @throws ReflectionException
     */
    public function __construct($value)
    {
        if ($value instanceof static) {
            $value = $value->getValue();
        }

        Assert::oneOf($value, $this->toArray());

        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getValue();
    }

    /**
     * Returns value of some type
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns all possible values as an array
     *
     * @return array Constant name in key, constant value in value
     * @throws ReflectionException
     */
    public static function toArray(): array
    {
        $class = static::class;

        if (!isset(static::$cache[$class])) {
            $reflection = new ReflectionClass($class);
            static::$cache[$class] = $reflection->getConstants();
        }

        return static::$cache[$class];
    }

    /**
     * Determines if Enum should be considered equal with the variable passed as a parameter.
     * Returns false if an argument is an object of different class or not an object.
     *
     * @param Enum $valueObject
     *
     * @return bool
     */
    final public function isEqualTo(self $valueObject): bool
    {
        return $this->getValue() === $valueObject->getValue();
    }
}