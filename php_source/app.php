<?php
require_once __DIR__ . '/config.php';

$app_id = isset($_GET['id']) ? strtolower(trim($_GET['id'])) : '';

if (isset($APPS[$app_id]) && isset($APPS[$app_id]['page'])) {
    header("Location: " . $APPS[$app_id]['page']);
    exit;
} else {
    header("Location: index.php");
    exit;
}
