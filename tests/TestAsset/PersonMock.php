<?php

namespace App\Test\TestAsset;

use App\Logger;
use App\Thing\Person;

class PersonMock extends Person
{
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;

        return $this;
    }
}