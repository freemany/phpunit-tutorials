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
     * @dataProvider pushTestDataProvider
     * @param string      $moveResponse
     * @param int         $carWeight
     * @param int         $personStrenght
     * @param null|string $expected
     */
    public function testPushWithMockBuilder(string $moveResponse, int $carWeight, int $personStrenght, ?string $expected)
    {
        $cart = $this->getMockBuilder(Cart::class)
                     ->disableOriginalConstructor()
                     ->getMock();
        $cart->expects($this->any())
             ->method('move')
             ->willReturn($moveResponse);
        $cart->expects($this->any())
            ->method('getWeight')
            ->willReturn($carWeight);

        $person = new Person('foo', $personStrenght);

        $this->assertSame($expected, $person->push($cart));
    }

    /**
     * @group person
     * @dataProvider pushTestDataProvider
     * @param string      $moveResponse
     * @param int         $carWeight
     * @param int         $personStrenght
     * @param null|string $expected
     */
    public function testPushWithMock(string $moveResponse, int $carWeight, int $personStrenght, ?string $expected)
    {
        $cart = new CartMock('foo', $carWeight);
        $cart->setResult($moveResponse);

        $person = new Person('bar', $personStrenght);

        $this->assertSame($expected, $person->push($cart));
    }

    public function pushTestDataProvider()
    {
        return [
            ['moving', 1, 2, 'moving'],
            ['moving', 1, 1, 'moving'],
            ['moving', 2, 1, null],
        ];
    }
}