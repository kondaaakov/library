<form method="post" class="personal_form">
    <?php if(isset($errors['password_repeat'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['password_repeat']) ?></p>
    <?php endif ?>
    <?php if(isset($errors['old_password'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['old_password']) ?></p>
    <?php endif ?>
    <label for="old_password" class="personal_label">Введите старый пароль:</label>

    <input type="password" id="old_password" name="old_password" class="personal_input">

    <label for="password" class="personal_label">Введите новый пароль:</label>
    <input type="password" id="password" name="password" class="personal_input">

    <label for="password_repeat" class="personal_label">Повторите новый пароль:</label>
    <input type="password" id="password_repeat" name="password_repeat" class="personal_input">

    <div class="personal_form_bottom">
        <button class="personal_btn" type="submit">Обновить</button>
    </div>
</form>