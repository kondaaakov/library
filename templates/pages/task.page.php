<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title">Глава <?= $title ?></h2>
    </div>

    <div class="task center">
	    <div class="books_top">
		    <a href="/book/chapter/?book=<?= $chapter['book_id'] ?>&chapter=<?= $chapter['id'] ?>" class="books_top_link"><i class="fas fa-chevron-left"></i> Назад</a>
	    </div>
	    <div class="task_block">
		    <h4 class="task_title"><?= $subtitle ?></h4>
		    <div class="task_question">
                <span class="task_number"><?= $subtitle ?> №<?= $task['number'] ?></span>. <?= $task['title'] ?>
		    </div>

		    <h4 class="task_title">Ответ</h4>
		    <div class="task_answer">
                <?= htmlspecialchars_decode($task['answer']) ?>
		    </div>
	    </div>

	    <div class="books_bottom">
            <?php if($lastTask): ?>
			    <a href="/book/task/?type=<?= $_GET['type'] ?>&id=<?= $lastTask['id'] ?>" class="books_top_link"><i class="fas fa-chevron-circle-left"></i> <?= ($table == 'questions') ? ("Предыдущий вопрос: Вопрос №".$lastTask['number']) : ("Предыдущее задание: Задание №".$lastTask['number']) ?></a>
            <?php endif; ?>
		    <div class="hidden">a</div>
            <?php if($nextTask): ?>
			    <a href="/book/task/?type=<?= $_GET['type'] ?>&id=<?= $nextTask['id'] ?>" class="books_top_link"><?= ($table == 'questions') ? ("Следующий вопрос: Вопрос №".$nextTask['number']) : ("Следующее задание: Задание №".$nextTask['number']) ?> <i class="fas fa-chevron-circle-right"></i></a>
            <?php endif; ?>
	    </div>
    </div>
</main>

<script src="/js/tasks.js"></script>