<?php

namespace App\Thing;

abstract class Thing
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}