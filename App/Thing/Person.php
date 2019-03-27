<?php

namespace App\Thing;

use App\Action\ActionInterface;
use App\Motion\MotionInterface;

class Person implements ActionInterface
{
    /**
     * @param Thing $object
     *
     * @return null|string
     */
    public function push(Thing $object): ?string
    {
        if ($object instanceof MotionInterface) {

            return $object->move();
        }

        return null;
    }
}
