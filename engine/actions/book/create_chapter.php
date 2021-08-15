<?php

if (!isset($_GET['id'])) {
    abort(404, 'Страница не найдена');
}

$forBook = dbGetRow("select * from books where id = ". $_GET['id'] .";");
if (!$forBook) {
    abort(404, 'Страница не найдена');
}


$title = 'Добавление главы';
$post = $errors = [];
$validator = require ENG_PATH . 'validators/createchapter.validator.php';
$lastChapter = dbGetRow("SELECT * FROM chapters WHERE book_id = ". $forBook['id'] ." order by number desc limit 1;");

if ($lastChapter) {
    $lastChapterNumber = $lastChapter['number'];
    $actuallyNumber = $lastChapterNumber + 1;

    $post['number'] = $actuallyNumber;
} else {
    $post['number'] = 1;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = array_clean($_POST);
    $errors = $validator['validate']($post);
    $chapterOnNumber = dbGetRow("SELECT * FROM chapters WHERE number=". $post['number'] ." AND book_id=". $forBook['id'] .";");
    $chapterOnTitle = dbGetRow("SELECT * FROM chapters WHERE title='". $post['title'] ."' AND book_id=". $forBook['id'] .";");
    if ($chapterOnNumber) {
        $errors['number'] = 'Глава с таким номером уже существует!';
    }
    if ($chapterOnTitle) {
        $errors['title'] = 'Глава с таким названием уже существует!';
    }


    if(!$errors) {
        $sql = dbQuery("INSERT INTO chapters(number, title, book_id) VALUES ('". $post['number'] ."', '". $post['title'] ."', '". $_GET['id'] ."');");

        if(!$sql) {
            $log = "Ошибка с добавлением главы в книгу ". $forBook['title'] ." в actions/book/create_chapter";
            writeLogDB('db', $log);
        }
        header('Location: http://' . $_SERVER['HTTP_HOST']. "/book/?id=" . $_GET['id']);
    }
}

$content = view('pages/createchapter.page', ['title' => $title, 'forBook' => $forBook, 'post' => $post, 'errors' => $errors]);
require TPL_PATH . 'layout.php';