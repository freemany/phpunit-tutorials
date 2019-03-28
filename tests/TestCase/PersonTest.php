<?php

namespace App\Test\TestCase;

use App\Test\TestAsset\CartMock;
use App\Thing\Person;
use PHPUnit\Framework\TestCase;
use App\Thing\Cart;

/**
 * Class PersonTest
 *
 * @package App\Test\TestCase
 */
class PersonTest extends TestCase
{
    /**
     * @group person
     * @dataProvider pushTestDataProvider
     * @param string      $moveResponse
     * @param int         $carWeight
     * @param int         $personStrength
     * @param null|string $expected
     */
    public function testPushWithMockBuilder(string $moveResponse, int $carWeight, int $personStrength, ?string $expected)
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

        $person = new Person('foo', ['maxStrength' => $personStrength]);

        $this->assertSame($expected, $person->push($cart));
    }

    /**
     * @group person
     * @dataProvider pushTestDataProvider
     * @param string      $moveResponse
     * @param int         $carWeight
     * @param int         $personStrength
     * @param null|string $expected
     */
    public function testPushWithMock(string $moveResponse, int $carWeight, int $personStrength, ?string $expected)
    {
        $cart = new CartMock('foo', ['weight' => $carWeight]);
        $cart->setResult($moveResponse);

        $person = new Person('bar', ['maxStrength' => $personStrength]);

        $this->assertSame($expected, $person->push($cart));
    }

    /**
     * @return array
     */
    public function pushTestDataProvider()
    {
        return [
            ['moving', 1, 2, 'moving'], // Person::maxStrength(2) > Cart::weight(1)
            ['moving', 1, 1, 'moving'], // Person::maxStrength(1) = Cart::weight(1)
            ['moving', 2, 1, null],     // Person::maxStrength(1) < Cart::weight(2) => null(not moving)
        ];
    }
}