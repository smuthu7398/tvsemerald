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

    echo json_encode([
        'stats'    => LeadRepository::stats($scope),
        'sources'  => LeadRepository::distinctSources($scope),
        'projects' => Auth::isAdmin() ? LeadRepository::distinctProjects() : [],
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    error_log('[API stats] ' . $e->getMessage());
    echo json_encode(['error' => 'server_error']);
}
