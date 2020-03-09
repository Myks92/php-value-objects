<?php

declare(strict_types=1);


namespace Myks92\ValueObjects;

/**
 * Interface Value Object
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
interface ValueObjectsInterface
{
    /**
     * @return string representation of the object
     */
    public function __toString(): string;

    /**
     * Indicates if this value object is equal to abother value object
     *
     * @param ValueObjectsInterface $object othervalue object to compare to
     *
     * @return boolean true if equal otherwise false
     */
    //public function isEqualTo(self $object): bool;
}