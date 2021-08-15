<?php

if (!isset($_GET)) {
    abort(404, "Страница не найдена");
}

$table = ($_GET['type'] == 'question') ? 'questions' : 'tasks';
$task = dbGetRow("SELECT * FROM ". $table ." WHERE id = ". $_GET['id'] .";");
if (!$task) abort(404, "Страница не найдена");
$chapter = dbGetRow("select * from chapters where id = ". $task['chapter_id'] .";");

$lastTask = dbGetRow("SELECT * FROM ". $table ." WHERE number = ". ($task['number'] - 1) ." AND chapter_id = ". $chapter['id'] .";");
$nextTask = dbGetRow("SELECT * FROM ". $table ." WHERE number = ". ($task['number'] + 1) ." AND chapter_id = ". $chapter['id'] .";");

$title = $chapter['number'] . ". " . $chapter['title'];
$subtitle = ($table = 'questions') ? 'Вопрос' : 'Задание';

$content = view('pages/task.page', [
    'title' => $title,
    'subtitle' => $subtitle,
    'chapter' => $chapter,
    'task' => $task,
    'table' => $table,
    'lastTask' => $lastTask,
    'nextTask' => $nextTask,
]);
return require TPL_PATH . 'layout.php';