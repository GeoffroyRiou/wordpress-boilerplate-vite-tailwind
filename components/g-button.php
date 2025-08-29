<?php
extract($args);
?>

<a href="<?= $url ?? '' ?>" class="g-button <?= $class ?? '' ?>" <?= !empty($external) ? 'target="_blank" rel="noopener"' : '' ?> >
    <?php if (!empty($icon)): ?>
        <?= svgIcon($icon) ?>
    <?php endif; ?>
    <span class="text"><?= $title ?? '' ?></span>
</a>