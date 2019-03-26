<?php

namespace App\Test\TestCase;

use PHPUnit\Framework\TestCase;

/**
 * Class SampleTest
 *
 * @package App\Test\TestCase
 */
class SampleTest extends TestCase
{
    public function testValid()
    {
        $this->assertTrue(true);
    }

    public function testException()
    {
        $message = 'exception message' . rand();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        throw new \InvalidArgumentException($message);
    }
}