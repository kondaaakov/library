<form method="post" action="/auth" class="auth_form">

    <?php if(isset($errorMsg)) : ?>
        <p class="auth_alert"><?= $errorMsg ?></p>
    <?php endif;?>
    <label class="auth_label" for="login">Логин:</label>
    <input type="text" class="auth_input" name="login" id="login">

    <label for="password" class="auth_label">Пароль:</label>
    <input type="password" class="auth_input" name="password" id="password">

    <div class="auth_form_bottom">
        <a href="/register" class="auth_link">Регистрация</a>
        <button class="auth_btn" type="submit">Войти</button>
    </div>
</form>