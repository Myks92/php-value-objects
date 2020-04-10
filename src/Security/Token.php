<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Security;


use DateTimeImmutable;
use DomainException;
use Webmozart\Assert\Assert;

/**
 * Class Token
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Token
{
    /**
     * Value
     *
     * @var string
     */
    private string $value;
    /**
     * Expires date
     *
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $expires;

    /**
     * @param string $value
     * @param DateTimeImmutable $expires
     */
    public function __construct(string $value, DateTimeImmutable $expires)
    {
        Assert::notEmpty($value);
        $this->value = mb_strtolower($value);
        $this->expires = $expires;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getValue();
    }

    /**
     * Validation token
     *
     * @param string $value
     * @param DateTimeImmutable $date
     */
    public function validate(string $value, DateTimeImmutable $date): void
    {
        if (!$this->isEqualTo($value)) {
            throw new DomainException('Token is invalid.');
        }
        if ($this->isExpiredTo($date)) {
            throw new DomainException('Token is expired.');
        }
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    private function isEqualTo(string $value): bool
    {
        return $this->value === $value;
    }

    /**
     * @param DateTimeImmutable $date
     *
     * @return bool
     */
    public function isExpiredTo(DateTimeImmutable $date): bool
    {
        return $this->expires <= $date;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Get expires
     *
     * @return DateTimeImmutable
     */
    public function getExpires(): DateTimeImmutable
    {
        return $this->expires;
    }
}