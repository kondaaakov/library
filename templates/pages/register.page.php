<?php
$post = $post ?? [];
?>

<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title"><?= $title ?></h2>
        <img class="header_page_img" src="/img/illustrations/register.header.png" alt="">
        <p class="header_page_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, consectetur dolores doloribus eaque excepturi expedita fugit impedit labore, neque officia pariatur porro quas quo veritatis voluptates. Distinctio nemo reiciendis ullam?</p>
    </div>

	<div class="reg center">
        <?php require TPL_PATH . 'elements/forms/register.form.php' ?>
	</div>
</main>