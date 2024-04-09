<?php

namespace fw\core;

class ErrorHandler{

    public function __construct() {
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']); 
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline) {
        if(error_reporting() && $errno){
            $exceptions = [
                            E_ERROR => "E_ERROR",
                            E_WARNING => "E_WARNING",
                            E_PARSE => "E_PARSE",
                            E_NOTICE => "E_NOTICE",
                            E_CORE_ERROR => "E_CORE_ERROR",
                            E_CORE_WARNING => "E_CORE_WARNING",
                            E_COMPILE_ERROR => "E_COMPILE_ERROR",
                            E_COMPILE_WARNING => "E_COMPILE_WARNING",
                            E_USER_ERROR => "E_USER_ERROR",
                            E_USER_WARNING => "E_USER_WARNING",
                            E_USER_NOTICE => "E_USER_NOTICE",
                            E_STRICT => "E_STRICT",
                            E_RECOVERABLE_ERROR => "E_RECOVERABLE_ERROR",
                            E_DEPRECATED => "E_DEPRECATED",
                            E_USER_DEPRECATED => "E_USER_DEPRECATED",
                            E_ALL => "E_ALL"
                        ];
        };
        $this->errorLog($errstr, $errfile, $errline);
        $this->displayError($exceptions[$errno], $errstr, $errfile, $errline);
        return true;
    }

    public function fatalErrorHandler() {
        $error = error_get_last();
        if(!empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
            ob_end_clean();
            $this->errorLog($error['message'], $error['file'], $error['line']);
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        }else{
            ob_end_flush();
        }
    }

    public function exceptionHandler($e) {
        $this->errorLog($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine());
    }

    protected function errorLog($message = '', $file = '', $line = '') {
        error_log("[" . date('Y-m-d H:i:s') ."] Text error: {$message} | File: {$file} | Line: {$line} \n==================================\n", 3, ROOT . '/tmp/errors.log');
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500) {
        http_response_code($response);
        if($response == 404 && !DEBUG){
            require WWW . 'errors/404.php';
        }
        if(DEBUG){
            require WWW. '/errors/develop.php';
        }else{
            require WWW. '/errors/prodact.php';
        }
        die;
    }
}