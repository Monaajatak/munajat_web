<?php

/**
 * Super Debug Bridge
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<pre>";
echo "--- Environment Check ---\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Current Dir: " . __DIR__ . "\n";
echo "Base Path: " . realpath(__DIR__ . '/..') . "\n";

$vendor = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($vendor)) {
    die("CRITICAL: vendor/autoload.php MISSING! Build likely failed.");
}

require $vendor;
echo "Composer Autoloader: OK\n";

$app_path = __DIR__ . '/../bootstrap/app.php';
if (!file_exists($app_path)) {
    die("CRITICAL: bootstrap/app.php MISSING!");
}

echo "Starting Laravel Boot...\n";

try {
    // Manually require to see where it breaks
    $app = require_once $app_path;
    echo "Application Instance: CREATED\n";
    
    // Check for core providers
    if (class_exists(\Illuminate\View\ViewServiceProvider::class)) {
        echo "ViewServiceProvider: FOUND\n";
    }

    echo "Capturing Request...\n";
    $request = \Illuminate\Http\Request::capture();
    echo "Request Captured: OK\n";

    echo "Handling Request...\n";
    $app->handleRequest($request);
    echo "--- Boot Finished ---\n";

} catch (\Throwable $e) {
    echo "\n!!! BOOT ERROR !!!\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
    echo "\nTrace:\n" . $e->getTraceAsString() . "\n";
}

echo "</pre>";
