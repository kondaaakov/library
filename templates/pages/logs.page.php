<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title"><?= $title ?></h2>
    </div>

    <div class="logs center">
        <?php foreach($logs as $log): ?>
	        <div class="log">
		        <p class="log_id">ID: <?= $log['id'] ?></p>
		        <p class="log_category"><?= $log['category'] ?></p>
		        <p class="log_text"><?= $log['log'] ?></p>
		        <p class="log_date"><?= changeDateFormat($log['created_at'], ) ?></p>
	        </div>
        <?php endforeach; ?>
    </div>
</main>