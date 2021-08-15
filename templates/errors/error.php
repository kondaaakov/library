<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $message ?></title>

	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/style.css">
    <script src="https://kit.fontawesome.com/ac1cf2cde9.js" crossorigin="anonymous"></script>
</head>
<body>
<?php require TPL_PATH . 'elements/header.php' ?>

<main class="container container_error">
	<div class="error_block">
		<h1 class="error_title"><?= isset($code) ? $code . ' ' : '' ?><?= $message ?></h1>
		<p><a class="error_link" href="/">Вернуться на главную</a></p>
	</div>

</main>

<?php require TPL_PATH . 'elements/footer.php' ?>
</body>
</html>