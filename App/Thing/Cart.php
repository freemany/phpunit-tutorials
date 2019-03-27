<?php

namespace App\Thing;

use App\Motion\MotionInterface;

/**
 * Class Cart
 *
 * @package App\Thing
 */
class Cart extends Thing implements MotionInterface
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function move(): string
    {
        $result = $this->name . ' is moving';
        return $result;
    }
}