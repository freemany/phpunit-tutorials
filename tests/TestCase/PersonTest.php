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
        $expected = 'i am moving';

        $cart = $this->getMockBuilder(Cart::class)
            ->disableOriginalConstructor()
            ->getMock();
        $cart->expects($this->once())
             ->method('move')
             ->willReturn($expected);

        $person = new Person();

        $this->assertSame($expected, $person->push($cart)); // assertEquals without type check
    }

    /**
     * @group person
     */
    public function testPushWithMock()
    {
        $expected = 'i am moving';

        $cart = new CartMock('name');
        $cart->setResult($expected);

        $person = new Person();

        $this->assertSame($expected, $person->push($cart));
    }
}