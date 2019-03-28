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
    /** @var int */
    protected $weight;

    public function __construct(string $name, $options = [])
    {
        parent::__construct($name, $options);
        $this->weight = $options['weight'] ?? $options['weight'];
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