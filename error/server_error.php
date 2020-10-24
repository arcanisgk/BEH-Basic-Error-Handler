<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/error/conf_error.php';
$error_text = 'Unknown Error';
$code = $_SERVER['REDIRECT_STATUS'];
$codes = [
    400 => 'Bad Request',
    401 => 'Unauthorized',
    402 => 'Payment Required',
    403 => 'Forbidden',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    406 => 'Not Acceptable',
    407 => 'Proxy Authentication Required',
    408 => 'Request Timeout',
    409 => 'Conflict',
    410 => 'Gone',
    411 => 'Length Required',
    412 => 'Precondition Failed',
    413 => 'Payload Too Large',
    414 => 'URI Too Long',
    415 => 'Unsupported Media Type',
    500 => 'Internal Server Error',
    501 => 'Not Implemented',
    502 => 'Bad Gateway',
    503 => 'Service Unavailable',
    504 => 'Gateway Timeout',
    505 => 'HTTP Version Not Supported',
];
$source_url = 'http' . ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (array_key_exists($code, $codes) && is_numeric($code)) {
    $error_text = $codes[$code];
}

/** @var array $conf */
$error_skin = $_SERVER['DOCUMENT_ROOT'] . '/error/skin/sk_' . $conf['skin'] . '_server_error.php';
if (file_exists($error_skin)) {
    /** @noinspection PhpIncludeInspection */
    require_once $error_skin;
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/error/skin/sk_basic_server_error.php';
}
die;