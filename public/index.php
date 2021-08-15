<?php

/* КОНСТАНТЫ ПУТЕЙ */

// Корень сайта
define('DOCROOT', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
// Шаблоны сайта
define('TPL_PATH', DOCROOT . 'templates' . DIRECTORY_SEPARATOR);
// Движок сайта
define('ENG_PATH', DOCROOT . 'engine' . DIRECTORY_SEPARATOR);
// Действия и функции-помощники движка
define('ACT_PATH', ENG_PATH . "actions" . DIRECTORY_SEPARATOR);
define('HLP_PATH', ENG_PATH . 'helpers' . DIRECTORY_SEPARATOR);

/* ПОДКЛЮЧЁННЫЕ ПОМОЩНИКИ */
require HLP_PATH . 'view.php';
require HLP_PATH . 'parserHTML.php';
require HLP_PATH . 'abort.php';
require HLP_PATH . 'changeDateFormat.php';
require HLP_PATH . 'writeLog.php';
require HLP_PATH . 'writeLogDB.php';
require HLP_PATH . 'arraysEdit.php';

/* КОНФИГУРАТОР БАЗЫ ДАННЫХ */
require ENG_PATH . 'db.php';

/* СТАРТ СЕССИИ */
session_set_cookie_params(60 * 60 * 24, '/', array_get($_SERVER, 'HTTP_HOST'), false, true);
session_start();

if(array_get($_COOKIE, 'auth_key')) {
    $user = dbGetRow(sprintf("select * from users where auth_key = '%s'", dbEscape($_COOKIE['auth_key'])));

    if($user) {
        $_SESSION['user'] = $user;
    }
}

/* МАРШРУТИЗАТОР САЙТА */
//$uri = explode('/', $_SERVER['REQUEST_URI']);
//$action = isset($uri[1]) && $uri[1] ? $uri[1] : 'home';
//
//$filePath = ACT_PATH . $action . '.php';
//// Если такого файла нет, то вызывается ошибка 404
//if (!file_exists($filePath)) {
//    $log = 'Пользователь попытался войти на страницу ' . $action . '.';
//    writeLogDB('access', $log);
//    abort(404, 'Страница не найдена');
//
//}
//// Если есть - подключается
//require($filePath);
// Собирает массив ссылки
$uriArr = array_values(array_filter(explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]), fn($it) => boolval($it))) ;

$currentAction = array_get($uriArr, 0, 'home');
$actionPath = ACT_PATH . $currentAction;

if(is_dir($actionPath)) {
    $fileName = array_get($uriArr, 1, $currentAction);
    $actionPath .= '/' . $fileName;
}

$filePath = $actionPath . '.php';
if (!file_exists($filePath)) {
    $log = 'Пользователь попытался войти на страницу ' . $currentAction . '.';
    writeLogDB('access', $log);
    abort(404, 'Страница не найдена');
}

require($filePath);