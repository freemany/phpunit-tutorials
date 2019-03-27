<?php

namespace App\Thing;

use App\Motion\MotionInterface;

/**
 * Class Cart
 *
 * @package App\Thing
 */
class Cart implements MotionInterface
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function move()
    {
        $result = $this->name . ' is moving';
        return $result;
    }
}