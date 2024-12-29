<?php

// Check PHP version
$minPhpVersion = '7.4';
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    die("Your PHP version must be {$minPhpVersion} or higher.");
}

// Path to the front controller
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
chdir(FCPATH);

// Load our paths config file
require FCPATH . '../app/Config/Paths.php';

$paths = new Config\Paths();

// Location of the framework bootstrap file.
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Load environment settings from .env files
require_once SYSTEMPATH . 'Config/DotEnv.php';
(new CodeIgniter\Config\DotEnv(ROOTPATH))->load();

// Launch the application
$app = Config\Services::codeigniter();
$app->initialize();
$context = is_cli() ? 'php-cli' : 'web';
$app->setContext($context);
$app->run();