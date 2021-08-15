<?php

if(!function_exists('abort')) {
    function abort(int $code, string $message = 'Неизвестная ошибка') {
        http_response_code($code);
        require(TPL_PATH . 'errors' . DIRECTORY_SEPARATOR . 'error.php');
        exit;
    }
}