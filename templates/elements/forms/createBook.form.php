<form method="post" class="books_form" enctype="multipart/form-data">
    <label for="title" class="books_form_label">Название книги:</label>
    <?php if(isset($errors['title'])): ?>
        <p class="reg_alert"><?= implode('<br>', (array)$errors['title']) ?></p>
    <?php endif ?>
    <input type="text" name="title" id="title" class="books_form_input" value="<?= array_get($post, 'title') ?>">

    <label for="authors" class="books_form_label">Автор(-ы):</label>
    <?php if(isset($errors['authors'])): ?>
        <p class="reg_alert"><?= implode('<br>', (array)$errors['authors']) ?></p>
    <?php endif ?>
    <input type="text" name="authors" id="authors" class="books_form_input" value="<?= array_get($post, 'authors') ?>">

    <label for="year" class="books_form_label">Год издания:</label>
    <?php if(isset($errors['year'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['year']) ?></p>
    <?php endif ?>
    <input type="number" name="year" id="year" class="books_form_input" value="<?= array_get($post, 'year') ?>">

    <label for="description" class="books_form_label">Описание книги:</label>
    <?php if(isset($errors['description'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['description']) ?></p>
    <?php endif ?>
    <textarea name="description" id="description" cols="30" rows="10" class="books_form_textarea"><?= array_get($post, 'description') ?></textarea>

    <label for="pages" class="books_form_label">Количество страниц:</label>
    <?php if(isset($errors['pages'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['pages']) ?></p>
    <?php endif ?>
    <input type="number" name="pages" id="pages" class="books_form_input" value="<?= array_get($post, 'pages') ?>">

	<?php if(!$hide): ?>
	    <label for="img" class="books_form_label">Обложка картинки:</label>
	    <input type="file" name="img" id="img" class="books_form_input" accept=".jpg, .jpeg, .png">
	<?php endif; ?>
    <button class="books_form_btn" type="submit">Готово</button>
</form>