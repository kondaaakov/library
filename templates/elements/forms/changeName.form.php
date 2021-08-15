<form method="post" class="personal_form">
    <label for="firstname" class="personal_label">Введите новое имя:</label>
    <?php if(isset($errors['firstname'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['firstname']) ?></p>
    <?php endif ?>
    <input type="text" id="firstname" name="firstname" class="personal_input">

    <label for="lastname" class="personal_label">Введите новую фамилию:</label>
    <?php if(isset($errors['lastname'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['lastname']) ?></p>
    <?php endif ?>
    <input type="text" id="lastname" name="lastname" class="personal_input">

    <div class="personal_form_bottom">
        <button class="personal_btn" type="submit">Обновить</button>
    </div>
</form>