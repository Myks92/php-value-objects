<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Person;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use InvalidArgumentException;

/**
 * Class Birthday
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Birthday
{
    /**
     * @var DateTimeInterface
     */
    private DateTimeInterface $date;
    /**
     *
     * @param DateTimeInterface $date
     *
     * @throws Exception
     */
    public function __construct(DateTimeInterface $date)
    {
        $this->guard($date);
        $this->date = $date;
    }

    /**
     * Calculate the age of a person
     *
     * @return Age
     * @throws Exception
     */
    public function getAge(): Age
    {
        return new Age((new DateTimeImmutable())->diff($this->getDate())->y);
    }

    /**
     * @return DateTimeInterface
     * @throws Exception
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function __toString(): string
    {
        return $this->getDate()->format('Y-m-d');
    }

    /**
     * @param Birthday $birthday
     *
     * @return bool
     * @throws Exception
     */
    public function isEqualTo(self $birthday): bool
    {
        return $this->getDate() === $birthday->getDate();
    }

    /**
     * @param DateTimeInterface $date
     *
     * @throws Exception
     */
    private function guard(DateTimeInterface $date): void
    {
        $now = new DateTimeImmutable();

        if ($date > $now) {
            throw new InvalidArgumentException('Is date from the future.');
        }
    }
}