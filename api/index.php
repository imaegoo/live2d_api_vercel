<?php

// Allow from any origin
header("Access-Control-Allow-Origin: https://www.imaegoo.com");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');    // cache for 1 day
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

$file= __DIR__ . '/..'.$_SERVER["PHP_SELF"];

if (file_exists($file)) {
    if (pathinfo($file)['extension'] == 'php') {
        return false;
    }
    ob_start();
    // 打开文件
    $handler = fopen($file, 'rb');
    $file_size = filesize($file);
    // 输出文件内容
    echo fread($handler, $file_size);
    fclose($handler);
    ob_end_flush();
    exit;
} else {
    http_response_code(404);
}
