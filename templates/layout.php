<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Заголовок страницы' ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;0,400;0,700;0,800;1,100;1,400;1,700;1,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="/styles/style.css">
	<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css">

	<script src="https://kit.fontawesome.com/ac1cf2cde9.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
</head>
<body>

<?php require TPL_PATH . 'elements/header.php' ?>

<?= $content ?>

<?php require TPL_PATH . 'elements/footer.php' ?>

</body>
</html>