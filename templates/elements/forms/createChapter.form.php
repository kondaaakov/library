<form method="post" class="createchapter_form">
    <label for="number" class="createchapter_label">Номер главы:</label>
    <?php if(isset($errors['number'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['number']) ?></p>
    <?php endif ?>
    <input type="number" name="number" id="number" class="createchapter_input" readonly value="<?= array_get($post, 'number') ?>">

    <label for="title" class="createchapter_label">Название главы:</label>
    <?php if(isset($errors['title'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['title']) ?></p>
    <?php endif ?>
    <input type="text" name="title" id="title" class="createchapter_input" value="<?= array_get($post, 'title') ?>">

	<button class="createchapter_btn">Готово</button>
</form>