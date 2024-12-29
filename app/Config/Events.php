<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events.
 */

Events::on('pre_system', static function () {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw new FrameworkException('zlib.output_compression is enabled. This may cause issues with CodeIgniter.');
        }
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     * If you delete, they will no longer be collected.
     */
    if (CI_DEBUG && ! is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        Services::toolbar()->respond();
    }
});

// Pre-Controller Event - Runs before controller execution
Events::on('pre_controller', static function () {
    // Set default timezone
    date_default_timezone_set(app_timezone());
    
    // Initialize session
    service('session');
});

// Post-Controller Event - Runs after controller execution
Events::on('post_controller', static function () {
    if (CI_DEBUG && ! is_cli()) {
        // Collect performance data
        Services::toolbar()->collect();
    }
});

// Post-System Event - Runs after the final rendered page
Events::on('post_system', static function () {
    if (CI_DEBUG && ! is_cli()) {
        // Display debug toolbar
        $toolbar = Services::toolbar();
        $toolbar->prepare();
    }
});

// Database Events
Events::on('DBQuery', static function ($query) {
    // Log queries in development environment
    if (ENVIRONMENT === 'development') {
        log_message('debug', 'Database Query: ' . $query);
    }
});

// Authentication Events
Events::on('login_success', static function ($user) {
    log_message('info', 'User logged in successfully: ' . $user['username']);
});

Events::on('login_failed', static function ($username) {
    log_message('warning', 'Failed login attempt for username: ' . $username);
});

Events::on('logout', static function ($user) {
    log_message('info', 'User logged out: ' . $user['username']);
});