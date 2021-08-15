<?php

$title = 'Тесты';

$str = 'Привет, это [br] новая строка!';
$strArr = explode(' ', $str);

$parseArr = [
    '[br]' => '<br>'
];

$content = view('pages/test.page', ['title' => $title, 'str' => $str, 'strArr' => $strArr, 'parseArr' => $parseArr]);
return require TPL_PATH . 'layout.php';