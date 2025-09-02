<?php
extract($args);
?>

<div class="g-page-head">
    <div class="content g-container">
        <h1 class="title"><?= $title ?></h1>
        <?php if (function_exists('yoast_breadcrumb')): ?>
            <?= yoast_breadcrumb('<p class="g-breadcrumbs">', '</p>'); ?>
        <?php endif; ?>
    </div>
</div>