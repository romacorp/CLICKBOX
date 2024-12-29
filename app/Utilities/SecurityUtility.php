<?php

namespace App\Utilities;

class SecurityUtility
{
    public static function sanitizeInput($input)
    {
        if (is_array($input)) {
            return array_map([self::class, 'sanitizeInput'], $input);
        }
        
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    public static function validateSession()
    {
        return session()->get('isLoggedIn') === true;
    }

    public static function getUserId()
    {
        return session()->get('user_id');
    }
}