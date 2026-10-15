<?php
header('Content-Type: application/json');
require_once __DIR__ . '/config.php';

$app = isset($_GET['app']) ? strtolower(trim($_GET['app'])) : 'all';
$counts = get_daily_downloads($app);

echo json_encode([
    'status'    => 'success',
    'timestamp' => time(),
    'data'      => $counts
]);
