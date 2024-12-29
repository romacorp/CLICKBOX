<?php

namespace App\Validation;

class CustomerRules
{
    public function validateIdentification(string $str): bool
    {
        return (bool) preg_match('/^[A-Z0-9]{5,20}$/', $str);
    }

    public function validateRating(string $str): bool
    {
        $rating = (int) $str;
        return $rating >= 1 && $rating <= 5;
    }
}