<?php

$title = 'Книги';
$books = dbGetAll("select * from books where hide = 'nohide';");

$content = view('pages/books.page', ['title' => $title, 'books' => $books]);
require TPL_PATH . 'layout.php';