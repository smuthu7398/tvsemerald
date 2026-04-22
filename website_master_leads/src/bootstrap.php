<?php
declare(strict_types=1);

if (!defined('APP_BOOT')) { http_response_code(403); exit('Forbidden'); }

// Single entry point for config + session + autoload.
$GLOBALS['CONFIG'] = require dirname(__DIR__) . '/config/config.php';

// Error display: off in prod, log everywhere
ini_set('display_errors', $GLOBALS['CONFIG']['app']['debug'] ? '1' : '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

// Autoload simple classes from /src
spl_autoload_register(static function (string $class): void {
    $file = __DIR__ . '/' . $class . '.php';
    if (is_file($file)) require $file;
});

// Session hardening
if (session_status() !== PHP_SESSION_ACTIVE) {
    $s = $GLOBALS['CONFIG']['session'];
    session_set_cookie_params([
        'lifetime' => $s['lifetime'],
        'path'     => '/',
        'domain'   => '',
        'secure'   => $s['secure'],
        'httponly' => true,
        'samesite' => $s['samesite'],
    ]);
    session_name('TVSLEADS');
    session_start();
}

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
