<form method="post" action="/register" class="reg_form">

	<!-- 1. ЛОГИН -->
    <label class="reg_label" for="login">Придумайте логин:</label>
    <?php if(isset($errors['login'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['login']) ?></p>
    <?php endif ?>
    <input type="text" class="reg_input" name="login" id="login" value="<?= array_get($post, 'login') ?>">

	<!-- 2. ИМЯ И ФАМИЛИЯ -->
	<label for="name" class="reg_label">Введите имя и фамилию:</label>
    <?php if(isset($errors['name'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['name']) ?></p>
    <?php endif ?>
	<div class="reg_form_middle">
		<input type="text" class="reg_input" name="name" id="name" placeholder="Имя" value="<?= array_get($post, 'name') ?>">
		<input type="text" class="reg_input" name="lastname" id="lastname" placeholder="Фамилия" value="<?= array_get($post, 'lastname') ?>">
	</div>

	<!-- 3. ПАРОЛЬ -->
    <label for="password" class="reg_label">Придумайте пароль:</label>
    <?php if(isset($errors['password'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['password']) ?></p>
    <?php endif ?>
    <input type="password" class="reg_input" name="password" id="password">

	<!-- 4. ПОВТОРЕНИЕ ПАРОЛЯ -->
	<label for="password_repeat" class="reg_label">Повторите пароль:</label>
    <?php if(isset($errors['password_repeat'])): ?>
		<p class="reg_alert"><?= implode('<br>', (array)$errors['password_repeat']) ?></p>
    <?php endif ?>
	<input type="password" class="reg_input" name="password_repeat" id="password_repeat">

	<!-- 5. ПОЧТА -->
	<label for="email" class="reg_label">Введите почту:</label>
    <?php if(isset($errors['email'])): ?>
		<p class="reg_alert"><?= implode(' ', (array)$errors['email']) ?></p>
    <?php endif ?>
	<input type="email" class="reg_input" name="email" id="email" value="<?= array_get($post, 'email') ?>">

    <div class="reg_form_bottom">
        <a href="/auth" class="auth_link">Вход</a>
        <button class="auth_btn" type="submit">Регистрация</button>
    </div>
</form>
