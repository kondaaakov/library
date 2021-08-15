<?php
$book = dbGetRow("select * from books where id = ". $_GET['book'] .";");
$chapter = dbGetRow("select * from chapters where id = ". $_GET['chapter'] ." AND book_id = ". $_GET['book'] .";");
if (!$chapter) {
    abort(404, 'Страница не найдена');
}

$lastChapter = dbGetRow("select * from chapters where number = ". ($chapter['number'] - 1) ." AND book_id = ". $_GET['book'] .";");
$nextChapter = dbGetRow("select * from chapters where number = ". ($chapter['number'] + 1) ." AND book_id = ". $_GET['book'] .";");

$questions = dbGetAll("select * from questions where chapter_id = ". $chapter['id'] .";");
$tasks = dbGetAll("select * from tasks where chapter_id = ". $chapter['id'] .";");
$title = $book['title'];

$content = view('pages/chapter.page', [
    'title' => $title,
    'book' => $book,
    'chapter' => $chapter,
    'questions' => $questions,
    'tasks' => $tasks,
    'lastChapter' => $lastChapter,
    'nextChapter' => $nextChapter,
]);

require TPL_PATH . 'layout.php';