<?php

if(!array_get($_SESSION, 'user')) {
    $log = 'Неизвестный пользователь попытался войти в личный кабинет без авторизации';
    writeLogDB('access', $log);
    abort(404, 'Страница не найдена');
}

$title = 'Личный кабинет';
$user = dbGetRow('select * from users where id = ' . $_SESSION['user']['id'] .';');
$validator = require ENG_PATH . 'validators/personal.validator.php';
$roles = [
    'user' => 'Пользователь',
    'admin' => 'Администратор',
    'blocked' => 'Заблокированный'
];
$post = $errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = array_clean($_POST);
    $errors = $validator['validate']($post);

    if (isset($post['old_password']) && !password_verify(dbEscape($post['old_password']) , $user['password'])) {
        $errors['old_password'] = 'Неверный старый пароль!';
    }

    if (!$errors['firstname'] && !$errors['lastname']) {
        $res = dbQuery("UPDATE `users` SET firstname='". dbEscape($post['firstname']) ."', lastname='". dbEscape($post['lastname']) ."' WHERE id = ". $user['id'] .";");
        if (!$res) {
            $log = 'Ошибка изменения фамилии и имени';
            writeLogDB('db', $log);
        }

        header('Location: http://' . $_SERVER['HTTP_HOST']. '/personal/');
    } else if (!$errors['password_repeat'] && password_verify(dbEscape($post['old_password']) , $user['password'])) {
        $sql = dbQuery("UPDATE `users` SET password='". password_hash($post['password'], PASSWORD_BCRYPT) ."' WHERE id = ". $user['id'] .";");
        if (!$sql) {
            $log = 'Ошибка изменения пароля';
            writeLogDB('db', $log);
        }

        header('Location: http://' . $_SERVER['HTTP_HOST']. '/personal/');
    } else if (!$errors['email']) {
        $sql = dbQuery("UPDATE `users` SET email='". dbEscape($post['email']) ."' WHERE id = ". $user['id'] .";");
        if (!$sql) {
            $log = 'Ошибка изменения почты';
            writeLogDB('db', $log);
        }

        header('Location: http://' . $_SERVER['HTTP_HOST']. '/personal/');
    }
}



$content = view('pages/personal.page', ['title' => $title, 'user' => $user, 'roles' => $roles, 'post' => $post, 'errors' => $errors]);
require TPL_PATH . 'layout.php';