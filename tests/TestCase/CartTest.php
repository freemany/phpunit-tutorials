<?php

namespace App\Test\TestCase;

use App\Thing\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
     public function testMove()
     {
         $name = 'foo';
         $expected = $name . ' is moving';
         $cart = new Cart($name);

         $this->assertSame($expected, $cart->move());
     }
}