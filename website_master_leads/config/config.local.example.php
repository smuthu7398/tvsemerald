<?php
/**
 * Copy this file to config.local.php and fill in real values.
 * config.local.php is gitignored — never commit it.
 */

return [
    'app' => [
        'env'   => 'production',              // 'production' | 'development'
        'name'  => 'TVS Emerald Website Leads',
        'url'   => 'https://leads.example.com',
        'debug' => false,
    ],
    'db' => [
        'host' => 'your-db-host.example.com',
        'name' => 'your_db_name',
        'user' => 'your_db_user',
        'pass' => 'your_db_password',
        'port' => 3306,
    ],
    'session' => [
        'lifetime_minutes' => 60,
        'cookie_secure'    => true,   // true when site is on HTTPS
        'cookie_samesite'  => 'Lax',
    ],
    'throttle' => [
        'max_attempts'    => 5,
        'lockout_minutes' => 15,
    ],
    'table' => 'tvsemerald_website_master_leads',
];
