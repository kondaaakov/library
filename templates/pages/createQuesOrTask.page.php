<?php
$post = $post ?? [];
?>

<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title"><?= $title ?></h2>
    </div>

    <div class="createchapter center">
        <div class="books_top">
            <a href="#" onclick="history.back()" class="books_top_link"><i class="fas fa-chevron-left"></i> Назад</a>
        </div>

        <div class="createchapter_container">
            <p class="createchapter_text">Создание <?= $_GET['action'] == 'createquestion' ? 'вопроса' : 'задания' ?> для главы: <a
                    href="/book/chapter/?book=<?= $book['id'] ?>&chapter=<?= $chapter['id'] ?>"><?= $chapter['title'] ?></a>. Книги <a
                    href="/book/?id=<?= $book['id'] ?>"><?= $book['title'] ?></a>.</p>
            <?php require TPL_PATH . 'elements/forms/createQorT.form.php'; ?>
        </div>
    </div>
</main>