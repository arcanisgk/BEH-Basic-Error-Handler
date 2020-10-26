<?php
declare(strict_types=1);

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

class handler_error
{

    private static ?handler_error $instance = null;

    public function __construct()
    {
        register_shutdown_function([$this, "ShutdownHandler"]);
        set_exception_handler([$this, "ExceptionHandler"]);
        set_error_handler([$this, "ErrorHandler"]);
    }

    public function ShutdownHandler()
    {
        $error = error_get_last();
        if (null != $error) {
            $this->CleanOutput();
            $error_type  = 'ShutdownHandler';
            $error_level = $error['type'];
            $error_desc  = $error['message'];
            $error_file  = $error['file'];
            $error_line  = $error['line'];
            $error_trace = array_reverse(debug_backtrace());
            array_pop($error_trace);
            $error_trace_smg = $this->getBactrace($error_trace, $error_type);
            $this->output($error_type, $error_level, $error_desc, $error_file, $error_line, $error_trace_smg);
        }
    }

    public function ExceptionHandler($e)
    {
        $this->CleanOutput();
        $error_type      = 'ExceptionHandler';
        $error_level     = ($e->getCode() == 0 ? 'Not Set' : $e->getCode());
        $error_desc      = $e->getMessage();
        $error_file      = $e->getFile();
        $error_line      = $e->getLine();
        $error_trace     = $e->getTrace();
        $error_trace_smg = $this->getBactrace($error_trace, $error_type);
        $this->output($error_type, $error_level, $error_desc, $error_file, $error_line, $error_trace_smg);
    }

    public function ErrorHandler($error_level = null, $error_desc = null, $error_file = null, $error_line = null)
    {
        $this->CleanOutput();
        $error_type  = 'ErrorHandler';
        $error_trace = array_reverse(debug_backtrace());
        array_pop($error_trace);
        $error_trace_smg = $this->getBactrace($error_trace, $error_type);
        $this->output($error_type, $error_level, $error_desc, $error_file, $error_line, $error_trace_smg);
    }

    private function getBactrace($error_trace, $error_type)
    {
        $error_trace_smg = '';
        if (!empty($error_trace)) {
            foreach ($error_trace as $track) {
                $error_trace_smg .= '  ' . (isset($track['file']) ? $track['file'] : '<unknown file>') . ' ' . (isset($track['line']) ? $track['line'] : '<unknown line>') . ' calling Method: ' . $track['function'] . '()' . PHP_EOL;
            }
        } else {
            $error_trace_smg = 'No backtrace data in the ' . $error_type . '.';
        }
        return $error_trace_smg;
    }

    /**
     * @param $error_type
     * @param $error_level
     * @param $error_desc
     * @param $error_file
     * @param $error_line
     * @param $error_trace_smg
     */
    private function output($error_type, $error_level, $error_desc, $error_file, $error_line, $error_trace_smg)
    {
        $conf = [];
        require_once $_SERVER['DOCUMENT_ROOT'] . '/error/conf_error.php';
        $out_type = $this->GetRQType($conf['error']);
        if ($out_type == 'plain') {
            /** @var array $conf */
            $error_skin = $_SERVER['DOCUMENT_ROOT'] . '/error/skin/sk_' . $conf['skin'] . '_handler_error.php';
            //header('content-type: text/plain');
            if (file_exists($error_skin)) {
                /** @noinspection PhpIncludeInspection */
                require_once $error_skin;
            } else {
                require_once $_SERVER['DOCUMENT_ROOT'] . '/error/skin/sk_basic_handler_error.php';
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(
                [
                    'error_type'      => $error_type,
                    'error_level'     => $error_level,
                    'error_desc'      => $error_desc,
                    'error_file'      => $error_file,
                    'error_line'      => $error_line,
                    'error_trace_smg' => $error_trace_smg,
                ]
            );
        }
        $this->ClearLastError();
    }

    private function CleanOutput()
    {
        ob_end_clean();
        flush();
    }

    private function ClearLastError()
    {
        error_clear_last();
        exit();
    }

    private function GetRQType($error)
    {
        /** @var string $error */
        if ($error == 'auto') {
            if (isset($_POST) && !empty($_POST)) {
                return (count($_POST) > 1 ? 'plain' : ($this->is_json($_GET) ? 'json' : 'plain'));
            }
            if (isset($_GET) && !empty($_GET)) {
                return (count($_GET) > 1 ? 'plain' : ($this->is_json($_GET) ? 'json' : 'plain'));
            }
            return 'plain';
        } else {
            return $error;
        }
    }

    private function is_json($value)
    {
        json_decode(current($value));
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public static function getInstance(): handler_error
    {
        if (!self::$instance instanceof self) self::$instance = new self;
        return self::$instance;
    }
}

handler_error::getInstance();