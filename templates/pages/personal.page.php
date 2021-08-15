<?php
$post = $post ?? [];
?>

<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title"><?= $title ?></h2>
        <img class="header_page_img" src="/img/illustrations/personal.header.png" alt="">
        <p class="header_page_text">Добро пожаловать в личный кабинет, <?= ucfirst($user['firstname']) ?>! Тут вы можете посмотреть подробную информацию об аккаунте: почта, логин, дата последнего визита. Также вы можете поменять некоторые данные и фотографию.</p>
    </div>

	<div class="personal center">
		<div class="personal_card">
			<h2 class="personal_cart_title">Информация о пользователе</h2>
			<div class="personal_card_top">
				<img class="personal_img" src="/img/user_avatars/<?= $user['img'] ?>" alt="">
				<div class="personal_card_top_right">
					<p class="personal_name"><?= ucfirst($user['firstname']) ?> <?= ucfirst($user['lastname']) ?></p>
					<p id="personal_login" class="personal_login"><i class="fas fa-exclamation-circle"></i> Логин: <?= $user['login'] ?></p>
				</div>
			</div>
			<div class="personal_card_middle">
				<p class="personal_role">Роль: <span class="personal_bold personal_bold_<?= $user['role'] ?>"><?= array_get($roles, $user['role']) ?></span></p>
				<p class="personal_email">Почта: <span class="personal_bold"><?= $user['email'] ?></span></p>
				<p class="personal_visit">Последний визит: <span class="personal_bold"><?= changeDateFormat($_SESSION['user']['last_visit']) ?></span></p>
			</div>
			<div class="personal_card_bottom">
				<p class="personal_id">ID: <span class="personal_bold"><?=  $user['id'] ?></span></p>
				<p class="personal_created">Дата регистрации: <span class="personal_bold"><?= changeDateFormat($user['created_at']) ?></span></p>
			</div>
		</div>
		<div class="personal_card">
			<h2 class="personal_cart_title">Изменить пароль</h2>
            <?php require TPL_PATH . 'elements/forms/changePassword.form.php' ?>
		</div>
		<div class="personal_card">
			<h2 class="personal_cart_title">Изменить почту</h2>
            <?php require TPL_PATH . 'elements/forms/changeEmail.form.php' ?>
		</div>
		<div class="personal_card">
			<h2 class="personal_cart_title">Изменить имя и фамилию</h2>
			<?php require TPL_PATH . 'elements/forms/changeName.form.php' ?>
		</div>
		<div class="personal_card">
			<h2 class="personal_cart_title">Сменить аватарку</h2>
            <?php require TPL_PATH . 'elements/forms/changeAvatar.form.php' ?>
		</div>
	</div>
</main>

<script>
    tippy('#personal_login', {
        content: 'Уникальный идентификатор, по которому проходит авторизация!',
        theme: 'our',
    });
</script>