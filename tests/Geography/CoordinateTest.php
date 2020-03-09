<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Geography;


use InvalidArgumentException;
use Myks92\ValueObjects\Geography\Coordinate;
use PHPUnit\Framework\TestCase;

class CoordinateTest extends TestCase
{
    public function testSuccess(): void
    {
        $coordinate = $this->createCoordinate($latitude = 20, $longitude = 20);

        self::assertEquals($latitude, $coordinate->getLatitude());
        self::assertEquals($longitude, $coordinate->getLongitude());
    }

    public function testEqual(): void
    {
        $coordinate = $this->createCoordinate();
        $coordinate2 = $this->createCoordinate(11, 10); //other

        self::assertTrue($coordinate->isEqualTo($coordinate));
        self::assertFalse($coordinate->isEqualTo($coordinate2));
    }

    public function testToString(): void
    {
        $coordinate = $this->createCoordinate();

        self::assertEquals($coordinate->getLatitude() . ',' . $coordinate->getLongitude(), $coordinate);
    }

    public function testIncorrectLatitudeMax(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->createCoordinate(91, 180);
    }

    public function testIncorrectLatitudeMin(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->createCoordinate(-91, 180);
    }

    public function testIncorrectLongitudeMax(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->createCoordinate(90, 181);
    }

    public function testIncorrectLongitudeMin(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->createCoordinate(90, -181);
    }

    /**
     * @param float $latitude
     * @param float $longitude
     *
     * @return Coordinate
     */
    private function createCoordinate($latitude = 53.5, $longitude = 55.6): Coordinate
    {
        return new Coordinate($latitude, $longitude);
    }
}