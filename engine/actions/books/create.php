<?php

if(!$_SESSION['user']['role'] == 'admin') {
    writeLogDB('access', 'Пользователь попытался войти на страницу добавления книги');
    abort(404, 'Страница не найдена');
}

$title = 'Добавление книги';
$post = $errors = [];
$validator = require ENG_PATH . 'validators/createbooks.validator.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = array_clean($_POST);
    $errors = $validator['validate']($post);

    if(!$errors) {
        if(isset($_FILES['img']['name']) && $_FILES['img']['name']) {
            $pathToImg = DOCROOT . 'public' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'books' . DIRECTORY_SEPARATOR;
            $file = pathinfo($_FILES['img']['name']);
            $namePhoto = 'book_' . date('Y_m_d_H_i') . '.' . $file['extension'];

            if (!copy($_FILES['img']['tmp_name'], $pathToImg . $namePhoto)) {
                $log = 'Не удалось загрузить обложку книги. Системная ошибка: ' . $_FILES['img']['error'];
                writeLogDB('upload', $log);
            }

            $sql = dbQuery("INSERT INTO `books` (`img`, `title`, `authors`, `year`, `description`, `pages`) VALUES ('" . $namePhoto . "', '" . dbEscape($post['title']) . "', '". dbEscape($post['authors']) ."', '". dbEscape($post['year']) ."', '". dbEscape($post['description']) ."', '". dbEscape($post['pages']) ."');");
            if(!$sql) {
                writeLogDB('db', 'Ошибка с отправкой запроса на добавление книги в базу данных в action/books');
                die;
            }

            header('Location: http://' . $_SERVER['HTTP_HOST']. '/books/');
        }
    }
}

$content = view('pages/createbook.page', ['title' => $title, 'post' => $post, 'errors' => $errors]);
return require TPL_PATH . 'layout.php';