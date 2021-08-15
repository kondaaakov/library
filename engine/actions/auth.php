<?php

$title = 'Авторизация';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $post = array_clean($_POST);

    if(!array_get($post, 'login') || !array_get($post, 'password')){
        $log = 'Пользователь попытался войти под логином ' . array_get($post, 'login') . '.';
        writeLogDB('users', $log);

        $errorMsg = 'Необходимо ввести логин и пароль!';
        $content = view('pages/auth.page', ['errorMsg' => $errorMsg, 'title' => $title]);

        return require TPL_PATH . 'layout.php';
    }

    $user = dbGetRow(sprintf("select * from users where login = '%s'", dbEscape($post['login'])));

    if(!$user || !password_verify(dbEscape($post['password']) , $user['password'])) {
        $log = 'Пользователь под логином ' . array_get($post, 'login') . ' ввёл неверный логин или пароль.';
        writeLogDB('users', $log);

        $errorMsg = 'Неправильный логин или пароль!';
        $content = view('pages/auth.page', ['errorMsg' => $errorMsg, 'title' => $title]);

        return require TPL_PATH . 'layout.php';
    }

    $_SESSION['user'] = $user;
    if ($_SESSION['user']) {
        dbQuery("UPDATE `users` SET `last_visit` = CURRENT_TIMESTAMP WHERE id = " . $_SESSION['user']['id'] . ";");
        $log = 'Пользователь авторизовался под именем ' . $_SESSION['user']['login'] . ' ' . $_SESSION['user']['id'] . '(ID).';
        writeLogDB('users', $log);
    }

    header('Location: http://' . $_SERVER['HTTP_HOST']. '/personal/');
}

$content = view('pages/auth.page', ['title' => $title]);
require TPL_PATH . 'layout.php';