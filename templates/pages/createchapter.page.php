<?php
$post = $post ?? [];
?>

<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title"><?= $title ?></h2>
    </div>

    <div class="createchapter center">
        <div class="books_top">
            <a href="/book/?id=<?= $forBook['id'] ?>" class="books_top_link"><i class="fas fa-chevron-left"></i> Назад</a>
        </div>

        <div class="createchapter_container">
	        <p class="createchapter_text">Создание главы для: <span class="createchapter_bold"><?= $forBook['title'] ?></span>.</p>
            <?php require TPL_PATH . 'elements/forms/createChapter.form.php'; ?>
        </div>
    </div>
</main>