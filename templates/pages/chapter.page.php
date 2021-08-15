<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title onebook_header_page_title"><?= $title ?> <span class="onebook_small">(<?= $book['year'] ?>)</span></h2>
        <img class="header_page_img onebook_header_page_img" src="/img/books/<?= $book['img'] ?>" alt="">
        <p class="header_page_text onebook_header_page_text"><?= htmlspecialchars_decode($book['description']) ?></p>
    </div>

    <div class="chapter center">
        <div class="books_top">
            <a href="/book/?id=<?= $book['id'] ?>" class="books_top_link"><i class="fas fa-chevron-left"></i> Назад</a>
        </div>

        <div class="chapter_container">
            <h3 class="chapter_title">Глава <?= $chapter['number'] ?>. <?= $chapter['title'] ?></h3>

            <div class="chapter_block">
                <h4 class="chapter_title_h4" id="questions">Вопросы</h4>
                <div class="chapter_questions chapter_content">
	                <?php foreach ($questions as $question): ?>
		                <a href="/book/task/?type=question&id=<?= $question['id'] ?>" class="chapter_question"><?= $question['number'] ?>. <?= $question['title'] ?></a>
	                <?php endforeach; ?>
                    <a href="/book/create_task/?book=<?= $book['id'] ?>&chapter=<?= $chapter['id'] ?>&action=createquestion" class="chapter_question"><i class="fas fa-plus-circle"></i> Создать вопрос</a>
                </div>
            </div>

            <div class="chapter_block">
                <h4 class="chapter_title_h4" id="tasks">Задания</h4>
                <div class="chapter_tasks chapter_content">
                    <a href="/book/create_task/?book=<?= $book['id'] ?>&chapter=<?= $chapter['id'] ?>&action=createtask" class="chapter_question"><i class="fas fa-plus-circle"></i> Создать задание</a>
                </div>
            </div>
        </div>

	    <div class="books_bottom">
		    <?php if($lastChapter): ?>
		        <a href="/book/chapter/?book=<?= $book['id'] ?>&chapter=<?= $lastChapter['id'] ?>" class="books_top_link"><i class="fas fa-chevron-circle-left"></i> Предыдущая глава: Глава <?= $lastChapter['number'] ?></a>
		    <?php endif; ?>
		    <div class="hidden">a</div>
            <?php if($nextChapter): ?>
		        <a href="/book/chapter/?book=<?= $book['id'] ?>&chapter=<?= $nextChapter['id'] ?>" class="books_top_link">Следующая глава: Глава <?= $nextChapter['number'] ?> <i class="fas fa-chevron-circle-right"></i></a>
			<?php endif; ?>
	    </div>
    </div>
</main>

<script>
    tippy('#questions', {
        content: 'Вид заданий, которые обычно расположены в конце глав',
        theme: 'our',
    });
    tippy('#tasks', {
        content: 'Работы / примеры, расположенные в самой главе',
        theme: 'our',
    });
</script>