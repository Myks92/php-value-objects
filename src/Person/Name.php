<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Person;


use Webmozart\Assert\Assert;

/**
 * Class Name
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Name
{
    /**
     * Last
     *
     * @var string
     */
    private string $last;
    /**
     * First
     *
     * @var string
     */
    private string $first;
    /**
     * Middle
     *
     * @var string|null
     */
    private ?string $middle;

    /**
     * @param string $last
     * @param string $first
     * @param string|null $middle
     */
    public function __construct(string $last, string $first, ?string $middle = null)
    {
        Assert::notEmpty($last);
        Assert::notEmpty($first);
        $this->last = $last;
        $this->first = $first;
        $this->middle = $middle;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getFull();
    }

    /**
     * Get full
     *
     * @param string $separator
     *
     * @return string
     */
    public function getFull(string $separator = ' '): string
    {
        return implode($separator, array_filter([
            $this->last,
            $this->first,
            $this->middle
        ]));
    }

    /**
     * Get last
     *
     * @return string
     */
    public function getLast(): string
    {
        return $this->last;
    }

    /**
     * Get fist
     *
     * @return string
     */
    public function getFirst(): string
    {
        return $this->first;
    }

    /**
     * Get middle
     *
     * @return string|null
     */
    public function getMiddle(): ?string
    {
        return $this->middle;
    }
}