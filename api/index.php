<?php

/**
 * Vercel Bridge Diagnostics
 */

// 1. Check for Autoloader
if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    http_response_code(500);
    echo "<h1>Vercel Deployment Error</h1>";
    echo "<p><strong>Missing vendor folder.</strong> This means <code>composer install</code> did not run correctly on Vercel.</p>";
    echo "<p>Path checked: " . realpath(__DIR__ . '/../vendor/autoload.php') . "</p>";
    exit;
}

// 2. Enable Detailed Errors for the bridge
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 3. Attempt Boot
try {
    require __DIR__ . '/../public/index.php';
} catch (\Exception $e) {
    echo "<h1>Laravel Initialization Error</h1>";
    echo "<pre>" . $e->getMessage() . "</pre>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
} catch (\Throwable $t) {
    echo "<h1>Laravel Fatal Error</h1>";
    echo "<pre>" . $t->getMessage() . "</pre>";
    echo "<pre>" . $t->getTraceAsString() . "</pre>";
}
