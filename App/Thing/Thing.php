<?php

namespace App\Thing;

abstract class Thing
{
    protected $name;
    protected $options;

    public function __construct(string $name, $options = [])
    {
        $this->name = $name;
        $this->options = $options;
    }
}