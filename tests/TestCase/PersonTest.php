<?php

namespace App\Test\TestAsset;

use App\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
     public function testPush()
     {
         $person = new Person();

         $this->assertFalse($person->push(1));
     }

     public function testException()
     {
         $this->expectException(\InvalidArgumentException::class);
         $this->expectExceptionMessage('hei wrong');

         $person = new Person();
         $person->push('freeman');
     }
}