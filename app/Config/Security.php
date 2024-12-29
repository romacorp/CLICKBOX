<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Security extends BaseConfig
{
    public $tokenName = 'csrf_token_name';
    public $headerName = 'X-CSRF-TOKEN';
    public $cookieName = 'csrf_cookie_name';
    public $expires = 7200;
    public $regenerate = true;
    public $redirect = true;
    public $samesite = 'Lax';
}