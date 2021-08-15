<?php
// Если нет гет запроса, то 404.
if (!isset($_GET['id'])) {
    abort(404, 'Страница не найдена');
}

$book = dbGetRow("select * from books where id = ". $_GET['id'] .";");
// Заголовком страницы является название книги
$title = $book['title'];
// Проверяем есть ли такая книга. Если нет, то 404.
if (!$book) {
    abort(404, 'Страница не найдена');
}

$chapters = dbGetAll("select * from chapters where book_id = ". $book['id'] .";");
$content = view('pages/book.page', ['title' => $title, 'book' => $book, 'chapters' => $chapters]);
require TPL_PATH . 'layout.php';