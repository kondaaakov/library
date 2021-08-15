<?php
$book = dbGetRow("select * from books where id = ". $_GET['book'] .";");
$chapter = dbGetRow("select * from chapters where id = ". $_GET['chapter'] ." AND book_id = ". $_GET['book'] .";");
$title = 'Создание вопроса / задания';

$post = $errors = [];
$validator = require ENG_PATH . 'validators/createQorT.validator.php';

$table = ($_GET['action'] == 'createquestion') ? 'questions' : 'tasks';
$lastTask = dbGetRow("SELECT * FROM ". $table ." WHERE chapter_id = ". $chapter['id'] ." order by number desc limit 1;");

if ($lastTask) {
    $lastTaskNumber = $lastTask['number'];
    $actuallyNumber = $lastTaskNumber + 1;

    $post['number'] = $actuallyNumber;
} else {
    $post['number'] = 1;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = array_clean($_POST);
    $errors = $validator['validate']($post);

    $questionOnNumber = dbGetRow("SELECT * FROM ". $table ." WHERE number=". $post['number'] ." AND chapter_id = ". $chapter['id'] .";");
    $questionOnTitle = dbGetRow("SELECT * FROM ". $table ." WHERE title='". $post['title'] ."';");

    if($questionOnNumber) $errors['number'] = 'Вопрос с таким номером уже существует!';
    if($questionOnTitle) $errors['title'] = 'Вопрос с таким названием уже существует!';

    if (!$errors) {
        $sql = dbQuery("INSERT INTO ". $table ."(chapter_id, number, title, answer) VALUES (". $_GET['chapter'] .", ". $post['number'] .", '". $post['title'] ."', '". $post['body'] ."');");
        if(!$sql) writeLogDB('db', "Ошибка с добавлением вопроса в книгу ". $book['title'] ." в actions/book/create_task");

        header('Location: http://' . $_SERVER['HTTP_HOST']. "/book/chapter/?book=". $book['id'] ."&chapter=". $chapter['id']);
    }

}


$content = view('pages/createQuesOrTask.page', ['title' => $title, 'book' => $book, 'chapter' => $chapter, 'post' => $post, 'errors' => $errors]);
return require TPL_PATH . 'layout.php';