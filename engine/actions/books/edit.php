<?php

if (!$_GET || !$_SESSION['user']['role'] == 'admin') {
    writeLogDB('access', 'Пользователь попытался войти на страницу редактирования книги');
    abort(404, 'Страница не найдена!');
}

$book = dbGetRow("select * from books where id = ". $_GET['id'] .";");
if (!$book) {
    abort(404, 'Страница не найдена!');
}


$title = 'Редактирование книги';
$post = $errors = [];
$validator = require ENG_PATH . 'validators/createbooks.validator.php';
$hide = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = array_clean($_POST);

    $errors = $validator['validate']($post);

    if($errors) {
        $content = view('pages/blogform',['title' => $title, 'post' => $post, 'errors' => $errors, 'hide' => $hide]);
        return require TPL_PATH . 'layout.php';
    }

    $res = dbQuery("UPDATE `books` SET title='". dbEscape($post['title']) ."', authors='". dbEscape($post['authors']) ."', year='". dbEscape($post['year']) ."', description='". dbEscapeAdm($post['description']) ."', pages='". dbEscape($post['pages']) ."' WHERE id = ". $_GET['id'] .";");

    if($res) {
        header('Location: http://' . $_SERVER['HTTP_HOST']. '/books/');
    } else {
        writeLogDB('db', 'Проблема с редактированием книги в /books/edit');
        die;
    }
}


$content = view('pages/createbook.page', ['title' => $title, 'post' => $book, 'errors' => $errors, 'hide' => $hide]);
return require TPL_PATH . 'layout.php';