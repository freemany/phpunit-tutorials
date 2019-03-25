<?php

namespace App\Test\TestAsset;

use App\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
     public function testPush()
     {
         $person = new Person();

         $this->assertFalse($person->push());
     }
}