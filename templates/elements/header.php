<header class="header center">
	<a href="/home/" class="header_link">Главная</a>
	<a href="/books/" class="header_link">Книги</a>
    <?php if (array_get($_SESSION, 'user')): ?>
	    <a href="/personal/" id="header_link_personal" class="header_link header_user_link"><img src="/img/user_avatars/<?= $_SESSION['user']['img'] ?>" alt="" class="header_img"><?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?></a>
	    <a href="/logout/" id="header_link_logout" class="header_link"><i class="fas fa-sign-out-alt"></i></a>
    <?php else: ?>
	    <a href="/auth/" id="header_link_auth" class="header_link"><i class="fas fa-user"></i></a>
    <?php endif; ?>
</header>

<script>
    tippy('#header_link_auth', {
        content: 'Войти в аккаунт',
        theme: 'our',
    });

    tippy('#header_link_logout', {
        content: 'Выйти из аккаунта',
        theme: 'our',
    });

    tippy('#header_link_personal', {
        content: 'Личный кабинет',
        theme: 'our',
    });
</script>