<?php

declare(strict_types = 1);

namespace App;

class Password
{
    public function isValid(string $password): bool
    {
        if(strlen($password) < 8){
            return false;
        }
    }
}