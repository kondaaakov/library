<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title onebook_header_page_title"><?= $title ?> <span class="onebook_small">(<?= $book['year'] ?>)</span></h2>
        <img class="header_page_img onebook_header_page_img" src="/img/books/<?= $book['img'] ?>" alt="">
        <p class="header_page_text onebook_header_page_text"><?= htmlspecialchars_decode($book['description']) ?></p>
    </div>

    <div class="onebook center">
        <div class="books_top">
            <a href="/books/" class="books_top_link"><i class="fas fa-chevron-left"></i> Назад</a>
            <?php if($_SESSION['user']['role'] == 'admin'): ?>
                <a href="/books/edit/?id=<?= $book['id'] ?>" class="books_top_link"><i class="fas fa-edit"></i> Редактировать книгу</a>
            <?php endif; ?>
        </div>
        
        <div class="onebook_container">
	        <?php foreach ($chapters as $chapter): ?>
		        <a href="/book/chapter/?book=<?= $book['id'] ?>&chapter=<?= $chapter['id'] ?>" class="onebook_chapter">
			        <span class="onebook_chapter_block">
				        <span class="onebook_chapter_title">Глава <?= $chapter['number'] ?>.</span> <?= $chapter['title'] ?>
			        </span>
		        </a>
	        <?php endforeach; ?>
            <a href="/book/create_chapter/?id=<?= $book['id'] ?>" class="onebook_chapter onebook_create_chapter"><i class="fas fa-plus"></i> Добавить главу</a>
        </div>
    </div>
</main>