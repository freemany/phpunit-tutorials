<?php

namespace App\Action;

use App\Thing\Thing;

interface ActionInterface
{
    public function push(Thing $object): ?string;
}