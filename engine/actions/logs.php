<?php

if(!$_SESSION['user']['login'] == 'admin') {
    $log = 'Неизвестный пользователь попытался войти на страницу логов';
    writeLogDB('access', $log);
    abort(404, 'Страница не найдена');
}

$title = 'Логи';

$logs = dbGetAll('select * from logs ORDER BY created_at desc;');

$content = view('pages/logs.page', ['title' => $title, 'logs' => $logs]);
require TPL_PATH . 'layout.php';