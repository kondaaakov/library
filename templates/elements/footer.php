<footer class="footer center">
	<div class="footer_user">
        <?php if (array_get($_SESSION, 'user')): ?>
			<a href="/personal/" id="footer_link_personal" class="footer_user_link"><img src="/img/user_avatars/<?= $_SESSION['user']['img'] ?>" alt="" class="footer_nav_img"><?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?></a>
        <?php else: ?>
			<a href="/auth/" class="footer_nav_link">Войти</a>
        <?php endif; ?>
	</div>

	<div class="footer_nav">
		<a href="/home/" class="footer_nav_link">Главная</a>
		<a href="/books/" class="footer_nav_link">Книги</a>
		<?php if($_SESSION['user']['role'] == 'admin'): ?>
			<a href="/books/allbooks" class="footer_nav_link">Все книги</a>
			<a href="/logs/" class="footer_nav_link">Логи</a>
		<?php endif; ?>
        <?php if (array_get($_SESSION, 'user')): ?>
			<a href="/logout/" id="footer_link_logout" class="footer_nav_link"><i class="fas fa-sign-out-alt"></i></a>
        <?php else: ?>
			<a href="/auth/" id="footer_link_auth" class="footer_nav_link"><i class="fas fa-user"></i></a>
        <?php endif; ?>
	</div>
</footer>

<script>
    tippy('#footer_link_auth', {
        content: 'Войти в аккаунт',
        theme: 'our',
    });

    tippy('#footer_link_logout', {
        content: 'Выйти из аккаунта',
        theme: 'our',
    });

    tippy('#footer_link_personal', {
        content: 'Личный кабинет',
        theme: 'our',
    });
</script>
