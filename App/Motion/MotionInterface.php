<?php

namespace App\Motion;

interface MotionInterface
{
    public function move(): string;

    public function getWeight(): int;
}