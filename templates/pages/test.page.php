<main class="container">
    <div class="header_page center">
        <h2 class="header_page_title"><?= $title ?></h2>
        <img class="header_page_img" src="/img/illustrations/logs.header.png" alt="">
        <p class="header_page_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, consectetur dolores doloribus eaque excepturi expedita fugit impedit labore, neque officia pariatur porro quas quo veritatis voluptates. Distinctio nemo reiciendis ullam?</p>
    </div>

    <div class="test center">
        <?php foreach ($strArr as $word => $value): ?>
            <?php if($value == array_search('<br>', $parseArr)): ?>
            <?= $strArr[$word] = array_get($parseArr, $value) ?>
            <p><?= $value ?></p>
            <?php endif; ?>
        <?php endforeach; ?>

        <p><?= parserHTML($str, '<br>') ?></p>
    </div>
</main>