<?php

namespace App\Test\TestCase;

use App\Thing\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    /**
     * @group cart
     */
     public function testMove()
     {
         $name = 'foo';
         $expected = $name . ' is moving';
         $cart = new Cart($name, 123);

         $this->assertSame($expected, $cart->move());
     }
}