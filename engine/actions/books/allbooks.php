<?php

if (!$_SESSION['user']['role'] == 'admin') {
    writeLogDB('access', 'Пользователь не администратор попытался зайти в список всех книг');
    abort(404, 'Страница не найдена');
}

$title = 'Все книги';
$books = dbGetAll("select * from books;");

if (isset($_GET['id']) && isset($_GET['hide'])) {
    $sql = dbQuery("UPDATE `books` SET hide='". $_GET['hide'] ."' WHERE id = ". $_GET['id'] .";");

    if (!$sql) {
        writeLogDB('db', 'Проблема с изменением статуса книги в allbooks');
    }

    header('Location: http://' . $_SERVER['HTTP_HOST']. '/books/allbooks/');
} else if (isset($_GET['id']) && isset($_GET['delete'])) {

}

$content = view('pages/allbooks.page', ['title' => $title, 'books' => $books]);
require TPL_PATH . 'layout.php';