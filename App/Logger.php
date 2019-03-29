<?php

namespace App;

class Logger
{
    public function log(string $message): bool
    {
        error_log($message);

        return true;
    }
}