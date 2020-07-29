<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Web;


use InvalidArgumentException;
use Myks92\ValueObjects\Web\Url;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Myks92\ValueObjects\Web\Url
 */
class UrlTest extends TestCase
{
    public function testSuccess(): void
    {
        $url = new Url($value = 'http://site.ru');

        self::assertEquals($value, $url->getValue());
    }

    public function testToString(): void
    {
        $url = new Url($value = 'http://site.ru');

        self::assertEquals((string)$value, $url);
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Url('www.site.ru');
    }

    public function testEqual(): void
    {
        $url = new Url('http://site.ru');
        $url2 = new Url('http://site2.ru'); //other

        self::assertTrue($url->isEqualTo($url));
        self::assertFalse($url->isEqualTo($url2));
    }
}