<?php
$post = $post ?? [];
?>

<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title"><?= $title ?></h2>
    </div>

    <div class="books center">
        <div class="books_top">
            <a href="#" onclick="history.back()" class="books_top_link"><i class="fas fa-chevron-left"></i> Назад</a>
        </div>

        <?php require TPL_PATH . 'elements/forms/createBook.form.php' ?>
    </div>
</main>