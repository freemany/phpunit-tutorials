<?php

namespace App\Thing;

use App\Action\ActionInterface;
use App\Motion\MotionInterface;

class Person extends Thing implements ActionInterface
{
    /** @var int */
    protected $maxStrength;

    public function __construct(string $name, $options = [])
    {
        parent::__construct($name, $options);
        $this->maxStrength = $options['maxStrength'] ?? $options['maxStrength'];
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
