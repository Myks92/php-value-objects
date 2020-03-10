<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Contact;


use Myks92\ValueObjects\String\StringLiteral;
use Webmozart\Assert\Assert;

/**
 * Class Email
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Email extends StringLiteral
{
    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::email($value);
        parent::__construct(mb_strtolower($value));
    }

    /**
     * Get the local of the email
     *
     * @return string
     */
    public function getLocal(): string
    {
        $parts = explode('@', $this->getValue());
        return $parts[0];
    }

    /**
     * Get the domain of the email
     *
     * @return string
     */
    public function getDomain(): string
    {
        $parts = explode('@', $this->getValue());
        return $parts[1];
    }
}