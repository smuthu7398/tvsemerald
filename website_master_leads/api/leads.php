<?php
declare(strict_types=1);

define('APP_BOOT', true);
require_once dirname(__DIR__) . '/src/bootstrap.php';

header('Content-Type: application/json');

if (!Auth::check()) {
    http_response_code(401);
    echo json_encode(['error' => 'unauthorized']);
    exit;
}

try {
    $user  = Auth::user();
    $scope = ['project' => Auth::isAdmin() ? null : ($user['project'] ?? null)];

    $payload = LeadRepository::paginate($_GET, $scope);
    echo json_encode($payload);
} catch (Throwable $e) {
    http_response_code(500);
    error_log('[API leads] ' . $e->getMessage());
    echo json_encode(['error' => 'server_error']);
}
