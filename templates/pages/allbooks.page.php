<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title"><?= $title ?></h2>
    </div>

    <div class="books center">
        <?php if($_SESSION['user']['role'] == 'admin'): ?>
            <div class="books_top">
	            <a href="/books/" class="books_top_link"><i class="fas fa-chevron-left"></i> Назад</a>
                <a href="/books/create/" class="books_top_link"><i class="fas fa-plus"></i> Добавить книгу</a>
            </div>
        <?php endif; ?>

        <div class="books_container">
            <?php foreach ($books as $book): ?>
            <div class="allbooks">
                <a href="/book/?id=<?= $book['id'] ?>" class="allbooks_title"><?= $book['title'] ?></a>
                <div class="allbooks_body">
                    <p class="allbooks_id">ID: <span class="allbooks_bold"><?= $book['id'] ?></span></p>
                    <p class="allbooks_authors">Автор(-ы): <span class="allbooks_bold"><?= $book['authors'] ?></span></p>
                    <p class="allbooks_created_at">Дата добавления: <span class="allbooks_bold"><?= changeDateFormat($book['created_at']) ?></span></p>
                    <p class="allbooks_interactive">
                        <a href="/books/edit/?id=<?= $book['id'] ?>" class="allbooks_edit" id="allbooks_edit"><i class="fas fa-edit"></i></a>
                        <?php if($book['hide'] == 'nohide'): ?>
                            <a href="?hide=hide&id=<?= $book['id'] ?>" id="allbooks_hide" class="allbooks_status"><i class="fas fa-eye"></i></a>
                        <?php else: ?>
                            <a href="?hide=nohide&id=<?= $book['id'] ?>" id="allbooks_nohide" class="allbooks_status"><i class="fas fa-eye-slash"></i></a>
                        <?php endif; ?>
	                    <a href="?delete=yes&id=<?= $book['id'] ?>" class="allbooks_delete" id="allbooks_delete"><i class="fas fa-trash-alt"></i></a>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<script>
    tippy('.allbooks_edit', {
        content: 'Редактировать книгу',
        theme: 'our',
    });
    tippy('.allbooks_delete', {
        content: 'Удалить книгу. Использовать при крайней необходимости!',
        theme: 'our',
    });
    tippy('#allbooks_hide', {
        content: 'Изменить статус на "спрятать"',
        theme: 'our',
    });
    tippy('#allbooks_nohide', {
        content: 'Изменить статус на "показать"',
        theme: 'our',
    });
</script>