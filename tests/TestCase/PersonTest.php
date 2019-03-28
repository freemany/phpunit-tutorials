<?php

namespace App\Test\TestCase;

use App\Test\TestAsset\CartMock;
use App\Thing\Person;
use PHPUnit\Framework\TestCase;
use App\Thing\Cart;

class PersonTest extends TestCase
{
    /**
     * @group person
     */
    public function testPushWithMockBuilder()
    {
        $expected = 'expected' . rand();

        $cart = $this->getMockBuilder(Cart::class)
                     ->disableOriginalConstructor()
                     ->getMock();
        $cart->expects($this->once())
             ->method('move')
             ->willReturn($expected);

        $person = new Person('foo');

        $this->assertSame($expected, $person->push($cart));
    }

    /**
     * @group person
     */
    public function testPushWithMock()
    {
        $expected = 'expected' . rand();

        $cart = new CartMock('bar');
        $cart->setResult($expected);

        $person = new Person('foo');

        $this->assertSame($expected, $person->push($cart));
    }
}