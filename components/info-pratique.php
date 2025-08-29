<?php

declare(strict_types=1);

extract($args);

?>

<div class="g-info-pratique">
    <span class="g-circle-icon">
        <?= svgIcon($icon) ?>
    </span>
    <span class="text"><?= nl2br($text) ?></span>
</div>