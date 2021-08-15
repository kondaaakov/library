<main class="container">
	<div class="header_page center">
		<h2 class="header_page_title"><?= $title ?></h2>
		<img class="header_page_img" src="/img/illustrations/home.header.png" alt="">
		<p class="header_page_text">По мере изучения языков, я буду читать разные книги по программированию. В этих книгах существует, как правило, огромное количество заданий и примеров, поэтому создан этот сайт, где будут выполненные задания и примеры &#128522;.</p>
	</div>
	<pre>
		<?= var_dump($_SESSION); ?>
	</pre>

	<?= $_SESSION['user']['firstname'] ?>

</main>