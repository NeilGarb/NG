<?php

require_once __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function($class) {
    $parts = explode('\\', ltrim($class, '\\'));
    if ($parts[0] == 'NG') {
        require_once __DIR__ . '/' . join('/', $parts) . '.php';
    }
});
