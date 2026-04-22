<?php
declare(strict_types=1);

define('APP_BOOT', true);
require_once dirname(__DIR__) . '/src/bootstrap.php';

if (!Auth::check()) {
    http_response_code(401);
    exit('Unauthorized');
}

if (!Auth::isAdmin()) {
    http_response_code(403);
    exit('Export is restricted to admin users.');
}

$scope = ['project' => null]; // admin sees everything

$filters = [
    'project'   => $_GET['project']   ?? null,
    'date_from' => $_GET['date_from'] ?? null,
    'date_to'   => $_GET['date_to']   ?? null,
    'source'    => $_GET['source']    ?? null,
    'search'    => $_GET['search']    ?? null,
];

$filename = 'leads_' . date('Ymd_His') . '.csv';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: no-store, no-cache, must-revalidate');

$out = fopen('php://output', 'w');
try {
    LeadRepository::exportCsv($scope, $filters, $out);
} catch (Throwable $e) {
    error_log('[API export] ' . $e->getMessage());
} finally {
    fclose($out);
}
