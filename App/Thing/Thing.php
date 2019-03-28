<?php

namespace App\Thing;

abstract class Thing
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}