<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Money;


use Myks92\ValueObjects\ValueObjectsInterface;

/**
 * Defines the minimum requisites of a Payment Object.
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Payment implements ValueObjectsInterface
{
    /**
     * @var string $method The payment name or title.
     */
    private string $method;
    /**
     * @var string $status Status of the payment: paid or not? Or in which status?
     */
    private ?string $status;

    /**
     * @param string $method
     * @param string $status
     */
    public function __construct(string $method, ?string $status = null)
    {
        $this->method = $method;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getMethod() . ':' . $this->getStatus();
    }
}