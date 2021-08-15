<?php

$title = 'Регистрация';
$validator = require ENG_PATH . 'validators/reg.validator.php';
$post = $errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $post = array_clean($_POST);
    $errors = $validator['validate']($post);

    if(!$errors){
        $res = dbQuery("INSERT INTO `users` (`login`, `password`, `email`, `firstname`, `lastname`) 
			VALUES ('". dbEscape($post['login']) ."', '". password_hash($post['password'], PASSWORD_BCRYPT) ."','". dbEscape($post['email']) ."','". dbEscape($post['name']) ."','". dbEscape($post['lastname']) ."');");

        if(!$res) {
            writeLogDB('db', 'Ошибка с отправкой запроса на регистрацию пользователя в action/register');
            die;
        }

        header('Location: http://' . $_SERVER['HTTP_HOST']. '/auth/');
    }

}

$content = view('pages/register.page', ['title' => $title, 'post' => $post, 'errors' => $errors]);
require TPL_PATH . 'layout.php';