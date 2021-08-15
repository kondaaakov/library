<main class="container">
	<div class="header_page center">
		<h2 class="header_page_title"><?= $title ?></h2>
		<img class="header_page_img" src="/img/illustrations/books.header.png" alt="">
		<p class="header_page_text">Тут отображаются непосредственно сами книги! Можно перейти на конкретную книгу, посмотреть главы к ней и задания.</p>
	</div>

	<div class="books center">
        <?php if($_SESSION['user']['role'] == 'admin'): ?>
		<div class="books_top">
			<a href="/books/allbooks/" class="books_top_link"><i class="fas fa-list"></i> Список всех книг</a>
			<a href="/books/create/" class="books_top_link"><i class="fas fa-plus"></i> Добавить книгу</a>
		</div>
		<?php endif; ?>
	
		<div class="books_container">
			<?php foreach ($books as $book): ?>
			<div class="book">
				<a href="/book/?id=<?= $book['id'] ?>" class="book_title"><?= $book['title'] ?></a>
				<p class="book_authors"><?= $book['authors'] ?></p>
				<div class="book_content">
					<img src="/img/books/<?= $book['img'] ?>" alt="" class="book_cover">
					<p class="book_description"><?= htmlspecialchars_decode($book['description']) ?></p>
				</div>
				<div class="book_bottom">
					<p class="book_year">Год издания: <span class="book_bold"><?= $book['year'] ?></span></p>
					<p class="book_pages">Количество страниц: <span class="book_bold"><?= $book['pages'] ?></span></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</main>