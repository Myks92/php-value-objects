<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Geography;


use Myks92\ValueObjects\ValueObjectInterface;
use Webmozart\Assert\Assert;

/**
 * Class Coordinate
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class Coordinate implements ValueObjectInterface
{
    /**
     * @var int min value for latitude
     */
    public const LATITUDE_MIN_VALUE = -90;
    /**
     * @var int max value for latitude
     */
    public const LATITUDE_MAX_VALUE = 90;
    /**
     * @var int min value for longitude
     */
    public const LONGITUDE_MIN_VALUE = -180;
    /**
     * @var int max value for longitude
     */
    public const LONGITUDE_MAX_VALUE = 180;
    /**
     * The latitude in degrees.
     *
     * Positive values indicate latitudes north of the equator, while negative
     * values indicate latitudes south of the equator.
     *
     * @var float
     */
    private float $latitude;
    /**
     * The longitude in degrees.
     *
     * Measurements are relative to the zero
     * meridian, with positive values extending east of the meridian and
     * negative values extending west of the meridian.
     *
     * @var float
     */
    private float $longitude;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        Assert::range($latitude, self::LATITUDE_MIN_VALUE, self::LATITUDE_MAX_VALUE);
        Assert::range($longitude, self::LONGITUDE_MIN_VALUE, self::LONGITUDE_MAX_VALUE);
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getLatitude() . ',' . $this->getLongitude();
    }

    /**
     * @inheritDoc
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @inheritDoc
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param Coordinate $coordinate
     *
     * @return bool
     */
    public function isEqualTo(self $coordinate): bool
    {
        return
            $this->getLongitude() === $coordinate->getLongitude() &&
            $this->getLatitude() === $coordinate->getLatitude();
    }
}