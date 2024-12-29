<?php

namespace Config;

use CodeIgniter\Config\BaseService;
use App\Services\AuthService;
use App\Services\CustomerService;
use App\Services\RatingService;
use App\Services\ValidationService;

class Services extends BaseService
{
    public static function auth($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('auth');
        }

        return new AuthService();
    }

    public static function customer($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('customer');
        }

        return new CustomerService();
    }

    public static function rating($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('rating');
        }

        return new RatingService();
    }

    public static function validation($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('validation');
        }

        return new ValidationService();
    }

    /**
     * Return the session manager
     */
    public static function session($config = null, $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('session', $config);
        }

        $config = $config ?? config('App');
        $logger = static::logger();

        return new \CodeIgniter\Session\Session($config, $logger);
    }

    /**
     * The Email class allows you to send email via mail, sendmail, SMTP.
     */
    public static function email($config = null, $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('email', $config);
        }

        $config = $config ?? config('Email');
        return new \CodeIgniter\Email\Email($config);
    }

    /**
     * Return the security class
     */
    public static function security($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('security');
        }

        return new \CodeIgniter\Security\Security(config('App'));
    }

    /**
     * Return the validation class
     */
    public static function validation($config = null, $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('validation', $config);
        }

        $config = $config ?? config('Validation');
        return new \CodeIgniter\Validation\Validation($config, static::renderer());
    }
}