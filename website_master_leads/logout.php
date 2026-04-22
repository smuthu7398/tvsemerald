<?php
declare(strict_types=1);

define('APP_BOOT', true);
require_once __DIR__ . '/src/bootstrap.php';

Auth::logout();

// Safe redirect: only allow relative paths to prevent open redirect.
$redirect = $_GET['redirect_url'] ?? 'login.php';
if (!is_string($redirect) || !preg_match('#^[A-Za-z0-9_./-]+$#', $redirect)) {
    $redirect = 'login.php';
}

header('Location: ' . $redirect);
exit;
