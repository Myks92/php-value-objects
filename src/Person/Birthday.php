<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Person;


use DateTimeImmutable;
use Exception;
use InvalidArgumentException;
use Myks92\ValueObjects\ValueObjectInterface;

/**
 * Class Birthday
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Birthday implements ValueObjectInterface
{
    /**
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $date;
    /**
     *
     * @param DateTimeImmutable $date
     *
     * @throws Exception
     */
    public function __construct(DateTimeImmutable $date)
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
     * @return DateTimeImmutable
     * @throws Exception
     */
    public function getDate(): DateTimeImmutable
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
     * @param DateTimeImmutable $date
     *
     * @throws Exception
     */
    private function guard(DateTimeImmutable $date): void
    {
        $now = new DateTimeImmutable();

        if ($date > $now) {
            throw new InvalidArgumentException('Is date from the future.');
        }
    }
}