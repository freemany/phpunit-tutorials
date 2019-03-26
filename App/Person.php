<?php

namespace App;

class Person
{
    /**
     * @return bool
     */
    public function push($thing)
    {
        if ($thing === 'freeman') {
            throw new \InvalidArgumentException('hei wrong');
        }
        return false;
    }
}