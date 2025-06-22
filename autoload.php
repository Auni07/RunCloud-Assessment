<?php

define('APP_ROOT', __DIR__ . DIRECTORY_SEPARATOR);

// Custom autoloader function using PSR-4 standard for 'RunCloud' namespace
spl_autoload_register(function ($className) {
    $namespacePrefix = 'RunCloud\\';
    $baseDirectory = APP_ROOT . 'src' . DIRECTORY_SEPARATOR;

    // Check if the class name starts with the namespace prefix
    $prefixLength = strlen($namespacePrefix);
    if (strncmp($namespacePrefix, $className, $prefixLength) !== 0) {
        return;
    }

    $relativeClass = substr($className, $prefixLength);

    // Replace namespace separators with directory separators
    $filePath = $baseDirectory . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

    // Check if the file exists and include it
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});