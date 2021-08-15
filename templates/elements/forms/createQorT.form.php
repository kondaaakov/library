<form method="post" class="createchapter_form">
    <label for="number" class="createchapter_label">Номер <?= $_GET['action'] == 'createquestion' ? 'вопроса' : 'задания' ?>:</label>
    <?php if(isset($errors['number'])): ?>
        <p class="reg_alert"><?= implode('<br>', (array)$errors['number']) ?></p>
    <?php endif ?>
    <input type="number" name="number" id="number" class="createchapter_input" readonly value="<?= array_get($post, 'number') ?>">

    <label for="title" class="createchapter_label"><?= $_GET['action'] == 'createquestion' ? 'Вопрос' : 'Задание' ?>:</label>
    <?php if(isset($errors['title'])): ?>
        <p class="reg_alert"><?= implode('<br>', (array)$errors['title']) ?></p>
    <?php endif ?>
    <input type="text" name="title" id="title" class="createchapter_input" value="<?= array_get($post, 'title') ?>">

    <label for="body" class="createchapter_label"><?= $_GET['action'] == 'createquestion' ? 'Ответ на вопрос' : 'Выполненное решение' ?>:</label>
    <?php if(isset($errors['body'])): ?>
        <p class="reg_alert"><?= implode('<br>', (array)$errors['body']) ?></p>
    <?php endif ?>
    <textarea name="body" id="body" class="createchapter_textarea"><?= array_get($post, 'body') ?></textarea>

    <button class="createchapter_btn">Готово</button>
</form>