<?php

namespace App\Thing;

use App\Action\ActionInterface;
use App\Motion\MotionInterface;
use App\Logger;

class Person extends Thing implements ActionInterface
{
    /** @var int */
    protected $maxStrength;
    protected $logger;

    public function __construct(string $name, $options = [])
    {
        parent::__construct($name, $options);
        $this->maxStrength = $options['maxStrength'] ?? $options['maxStrength'];
    }

    /**
     * @return Logger
     */
    protected function getLogger(): Logger
    {
        if (null === $this->logger) {
            $this->logger = new Logger();
        }
        return $this->logger;
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

            $response = $object->move();
            $this->getLogger()->log($response);

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
