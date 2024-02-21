<?php

declare(strict_types = 1);

namespace App;

class Password
{
    private int $minimumLenght = 8;

    private string $regexLowercaseLetter = '/[a-z]/';

    private string $regexCapitalLetter = '/[A-Z]/';

    private string $regexNumber = '/[0-9]/';

    private string $regexSpecialCharacter = '/[.*#@\$%&]/';

    public function isValid(string $password): bool
    {
        if($this->haveTheRequireLenght($password)){
            return false;
        }

        if($this->haveLowercaseLetter($password)){
            return false;
        }

        if($this->haveCapitalLetter($password)){
            return false;
        }

        if(preg_match($this->regexNumber, $password) !== 1){
            return false;
        }

        if(preg_match($this->regexSpecialCharacter, $password) !== 1){
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
        return strlen($password) < $this->minimumLenght;
    }

    private function haveLowercaseLetter(string $password): bool
    {
        return preg_match($this->regexLowercaseLetter, $password) !== 1;
    }

    private function haveCapitalLetter(string $password): bool
    {
        return preg_match($this->regexCapitalLetter, $password) !== 1;
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