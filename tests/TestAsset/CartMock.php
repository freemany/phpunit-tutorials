<?php

namespace App\Test\TestAsset;

use App\Thing\Cart;

class CartMock extends Cart
{
    protected $result;

    public function setResult($result): void
    {
        $this->result = $result;
    }

    public function move(): string
    {
        return $this->result;
     }
}