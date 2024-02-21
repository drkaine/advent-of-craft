<?php

declare(strict_types = 1);

namespace App;

class Password
{
    public function isValid(string $password): bool
    {
        $haveTheRequireLenght = $this->haveTheRequireLenght($password);

        if($haveTheRequireLenght){
            return false;
        }

        if(preg_match('/[a-z]/', $password) !== 1){
            return false;
        }

        if(preg_match('/[A-Z]/', $password) !== 1){
            return false;
        }

        if(preg_match('/[0-9]/', $password) !== 1){
            return false;
        }

        if(preg_match('/[.*#@\$%&]/', $password) !== 1){
            return false;
        }

        $haveUnauthorizedCharacter = $this->verifyNonAuthorizedCharacter($password);

        if($haveUnauthorizedCharacter) {
            return false;
        }

        return true;
    }

    private function haveTheRequireLenght(string $password): bool
    {
        return strlen($password) < 8;
    }

    private function verifyNonAuthorizedCharacter(string $password): bool
    {
        $passwordTest = preg_replace('/[a-z]/', '', $password);

        $passwordTest = preg_replace('/[A-Z]/', '', $passwordTest);

        $passwordTest = preg_replace('/[0-9]/', '', $passwordTest);

        $passwordTest = preg_replace('/[.*#@\$%&]/', '', $passwordTest);

        return $passwordTest !== '';
    }
}