<?php

$dbConfig = require DOCROOT . 'config/database.php';

ob_start();
$connection = mysqli_connect(
    $dbConfig['host'],
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['db']
);
ob_end_clean();

if (!$connection) {
    $err = mysqli_connect_errno() . ':' . mysqli_connect_error();
    writeLog($err,'sql/DATABASE');
    abort(404, 'Нет соединения с базой данных!');
}

if (!function_exists('dbGetAll')) {
    function dbGetAll(string $sql) : array {
        $connection = $GLOBALS['connection'];
        $result = mysqli_query($connection, $sql);

        if (!$result) {
            $err = mysqli_error($connection) . ' in (' . $sql . ')';
            writeLog($err, 'sql/MySQL');
            return [];
        }

        $data = [];
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}

if(!function_exists('dbGetRow')) {
    function dbGetRow(string $sql): array {
        $connection = $GLOBALS['connection'];
        $res = mysqli_query($connection, $sql);

        if(!$res){
            $err = mysqli_error($connection) . ' in (' . $sql . ')';
            writeLog($err, 'sql/MySQL');
            return [];
        }

        $data = mysqli_fetch_assoc ($res);
        return $data ?: [];
    }
}


if(!function_exists('dbEscape')) {
    /**
     * Функция экранизации и защиты введённых строк пользователей.
     * @param $val string - строка, которую надо проработать.
     * @return string
     */
    function dbEscape (string $val): string
    {
        $connection = $GLOBALS['connection'];
        return mysqli_real_escape_string($connection, (string) htmlspecialchars(strip_tags($val, ['br']), ENT_QUOTES));
    }
}

if(!function_exists('dbEscapeAdm')) {
    /**
     * Функция экранизации и защиты введённых строк пользователей.
     * @param $val string - строка, которую надо проработать.
     * @return string
     */
    function dbEscapeAdm (string $val): string
    {
        $connection = $GLOBALS['connection'];
        return mysqli_real_escape_string($connection, (string) strip_tags($val, ['br', 'ul', 'ol', 'li', 'code']));
    }
}

if(!function_exists('dbQuery')) {
    function dbQuery (string $sql) {
        $connection = $GLOBALS['connection'];
        $res = mysqli_query($connection, $sql);

        if(!$res){
            $err = mysqli_error($connection) . ' in (' . $sql . ')';
            writeLog($err, 'sql/MySQL');
            return null;
        }

        return $res;
    }
}