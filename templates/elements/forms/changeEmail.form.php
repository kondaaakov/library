<form method="post" class="personal_form">
    <?php if(isset($errors['email'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['email']) ?></p>
    <?php endif ?>
    <label for="email" class="personal_label">Введите новую почту:</label>
    <input type="email" id="email" name="email" class="personal_input">

    <div class="personal_form_bottom">
        <button class="personal_btn" type="submit">Обновить</button>
    </div>
</form>