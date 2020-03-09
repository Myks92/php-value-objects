<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Contact;


use InvalidArgumentException;
use Myks92\ValueObjects\Contact\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testSuccess(): void
    {
        $email = new Email($value = 'email@app.test');

        self::assertEquals($value, $email->getValue());
    }

    public function testToString(): void
    {
        $email = new Email($value = 'email@app.test');

        self::assertEquals($value, $email);
    }

    public function testCase(): void
    {
        $email = new Email('EmAil@app.test');

        self::assertEquals('email@app.test', $email->getValue());
    }

    public function testLocal(): void
    {
        $email = new Email('email@app.test');

        self::assertEquals('email', $email->getLocal());
    }

    public function testDomain(): void
    {
        $email = new Email('email@app.test');

        self::assertEquals('app.test', $email->getDomain());
    }

    public function testEqual(): void
    {
        $email = new Email('email@app.test');
        $email2 = new Email('email-other@app.test'); //other

        self::assertTrue($email->isEqualTo($email));
        self::assertFalse($email->isEqualTo($email2));
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Email('not-email');

        $this->expectException(InvalidArgumentException::class);
        new Email($value = 'email@app.test ');

        $this->expectException(InvalidArgumentException::class);
        new Email($value = ' email@app.test');
    }

    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Email('');
    }
}