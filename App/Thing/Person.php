<?php

namespace App\Thing;

use App\Action\ActionInterface;
use App\Motion\MotionInterface;

class Person implements ActionInterface
{
    protected $maxStrength;
    protected $name;

    public function __construct($name, $maxStrength)
    {
        $this->name = $name;
        $this->maxStrength = $maxStrength;
    }

    /**
     * @param Thing $object
     *
     * @return null|string
     */
    public function push(Thing $object): ?string
    {
        if ($object instanceof MotionInterface) {

            if (false === $this->checkPushable($object)) {
                return null;
            }

            return $object->move();
        }

        return null;
    }

    /**
     * @param MotionInterface $object
     *
     * @return bool
     */
    protected function checkPushable(MotionInterface $object): bool
    {
        $weight = $object->getWeight();

        if ($this->maxStrength < $weight) {
            return false;
        }

        return true;
    }
}
