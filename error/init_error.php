<?php
try {
    if (ini_set('session.gc_maxlifetime', '0') === false) {
        throw new Exception('Unable to set session.gc_maxlifetime.');
    }
    if (ini_set('session.use_only_cookies', '1') === false) {
        throw new Exception('Unable to set session.use_only_cookies.');
    }
    if (ini_set('session.cookie_httponly', '1') === false) {
        throw new Exception('Unable to set session.cookie_httponly.');
    }
    if (ini_set('error_reporting', '1') === false) {
        throw new Exception('Unable to set error_reporting.');
    }
    if (ini_set('display_errors', '0') === false) {
        throw new Exception('Unable to set display_errors.');
    }
} catch (Exception $e) {
    echo 'Exception catch: ', $e->getMessage(), "\n";
}

error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/error/handler_error.php';
