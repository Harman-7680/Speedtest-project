<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: *");

$type = $_GET['type'] ?? '';

if ($type === 'ping') {
    echo json_encode(["status" => "ok"]);
    exit;
}

if ($type === 'download') {
    header('Content-Type: application/octet-stream');
    echo str_repeat('A', 5 * 1024 * 1024); // 5MB
    exit;
}

if ($type === 'upload') {
    $data = file_get_contents("php://input");
    echo json_encode(["size" => strlen($data)]);
    exit;
}

echo "Invalid";
