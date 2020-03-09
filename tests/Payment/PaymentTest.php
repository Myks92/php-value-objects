<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Tests\Payment;


use Myks92\ValueObjects\Payment\Payment;
use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{
    public function testSuccess(): void
    {
        $payment = new Payment($method = 'pay-pal', $status = 'success');

        self::assertEquals($method, $payment->getMethod());
        self::assertEquals($status, $payment->getStatus());
    }

    public function testToString(): void
    {
        $payment = new Payment($method = 'pay-pal', $status = 'success');

        self::assertEquals($method . ':' . $status, $payment);
    }
}