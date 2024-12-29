<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail;
    public $fromName;
    public $protocol = 'mail';
    public $SMTPHost;
    public $SMTPUser;
    public $SMTPPass;
    public $SMTPPort = 25;
    public $SMTPTimeout = 5;
    public $mailType = 'html';
    public $charset = 'UTF-8';
    public $validate = false;
}