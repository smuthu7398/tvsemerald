<?php
declare(strict_types=1);

if (!defined('APP_BOOT')) { http_response_code(403); exit('Forbidden'); }

/**
 * Loads config from config/config.local.php.
 * Copy config.local.example.php → config.local.php and fill in real values.
 */

$localPath = __DIR__ . '/config.local.php';

if (!is_readable($localPath)) {
    http_response_code(500);
    exit('Missing config/config.local.php — copy config.local.example.php and fill in values.');
}

$local = require $localPath;

return [
    'app' => [
        'env'   => $local['app']['env']   ?? 'production',
        'name'  => $local['app']['name']  ?? 'Website Leads',
        'url'   => $local['app']['url']   ?? '',
        'debug' => (bool) ($local['app']['debug'] ?? false),
    ],
    'db' => [
        'host' => $local['db']['host'] ?? '',
        'name' => $local['db']['name'] ?? '',
        'user' => $local['db']['user'] ?? '',
        'pass' => $local['db']['pass'] ?? '',
        'port' => (int) ($local['db']['port'] ?? 3306),
    ],
    'session' => [
        'lifetime' => ((int) ($local['session']['lifetime_minutes'] ?? 60)) * 60,
        'secure'   => (bool) ($local['session']['cookie_secure'] ?? false),
        'samesite' => $local['session']['cookie_samesite'] ?? 'Lax',
    ],
    'throttle' => [
        'max_attempts'    => (int) ($local['throttle']['max_attempts']    ?? 5),
        'lockout_minutes' => (int) ($local['throttle']['lockout_minutes'] ?? 15),
    ],
    'table' => $local['table'] ?? 'tvsemerald_website_master_leads',
];
