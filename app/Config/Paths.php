<?php

namespace Config;

class Paths
{
    public $systemDirectory = __DIR__ . '/../../vendor/codeigniter4/framework/system';
    
    public function __construct()
    {
        $this->systemDirectory = rtrim($this->systemDirectory, '\\/ ');
        
        if (!is_dir($this->systemDirectory)) {
            throw new \Exception("System directory doesn't exist: {$this->systemDirectory}");
        }
    }
}