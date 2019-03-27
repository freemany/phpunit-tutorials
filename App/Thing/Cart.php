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
    protected $weight;

    public function __construct(string $name, int $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function move(): string
    {
        $result = $this->name . ' is moving';

        return $result;
    }
}