<?php

namespace App\Test\TestCase;

use App\Logger;
use App\Test\TestAsset\CartMock;
use App\Test\TestAsset\PersonMock;
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
     * @group        person
     * @dataProvider pushTestDataProvider
     *
     * @param string      $moveResponse
     * @param int         $carWeight
     * @param int         $personStrength
     * @param null|string $expected
     */
    public function testPushWithMockBuilder(
        string $moveResponse,
        int $carWeight,
        int $personStrength,
        ?string $expected
    ) {
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
     * @group        person
     * @dataProvider pushTestDataProvider
     *
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

    /**
     * @group logger
     * @group person
     */
    public function testLoggerIsCalled()
    {
        $logger = $this->getMockBuilder(Logger::class)
                       ->disableOriginalConstructor()
                       ->getMock();

        $logger->expects($this->once())->method('log'); // assert if it is called once

        $cart = $this->getMockBuilder(Cart::class)
                     ->disableOriginalConstructor()
                     ->getMock();

        $cart->method('getWeight')->willReturn(1);

        $person = new PersonMock('foo', ['maxStrength' => 2]);
        $person->setLogger($logger);
        $person->push($cart);
    }

    /**
     * @group logger
     * @group person
     */
    public function testLoggerIsNotCalled()
    {
        $logger = $this->getMockBuilder(Logger::class)
                       ->disableOriginalConstructor()
                       ->getMock();
        $logger->expects($this->never())// Never called
        ->method('log');

        $cart = $this->getMockBuilder(Cart::class)
                     ->disableOriginalConstructor()
                     ->getMock();

        $cart->method('getWeight')->willReturn(2);

        $person = new PersonMock('foo', ['maxStrength' => 1]);
        $person->setLogger($logger);
        $person->push($cart);
    }

    /**
     * @group        logger
     * @group        person
     * @dataProvider loggerDataProvider
     *
     * @param int    $weight
     * @param int    $maxStrength
     * @param string $expected
     */
    public function testLoggerIsCalledWithMock(int $weight, int $maxStrength, string $expected)
    {
        $logger = $this->getMockBuilder(Logger::class)
                       ->disableOriginalConstructor()
                       ->getMock();
        switch ($expected) {
            case 'once':
                $logger->expects($this->once())->method('log'); // Once
                break;
            case 'never':
            default:
                $logger->expects($this->never())->method('log'); // Never
                break;
        }

        $cart = new CartMock('foo', ['weight' => $weight]);
        $cart->setResult('dummy_result');
        $person = new PersonMock('bar', ['maxStrength' => $maxStrength]);
        $person->setLogger($logger);
        $person->push($cart);
    }

    /**
     * @return array
     */
    public function loggerDataProvider(): array
    {
        return [
            [1, 2, 'once'],
            [2, 1, 'never'],
        ];
    }
}