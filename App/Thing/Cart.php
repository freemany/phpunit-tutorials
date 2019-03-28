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
    public function move(): string
    {
        $result = $this->name . ' is moving';
        return $result;
    }
}