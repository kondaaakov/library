<?php

if(!function_exists('writeLog')) {
    function writeLog(string $message, string $fileName = 'errors') : bool {
        $fileName = DOCROOT . '/data/logs/' . $fileName . date('_d_m_Y') . '.log';
        $handle = fopen($fileName, 'a');
        $log = $message . PHP_EOL;

        if(!fwrite($handle, $log)) {
            return false;
        }
        return true;
    }
}