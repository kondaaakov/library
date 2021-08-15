<?php

$title = 'Главная';

$content = view('pages/home.page', ['title' => $title]);
require TPL_PATH . 'layout.php';