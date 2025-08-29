<?php

extract($args);

// Attachment
$image = get_post_thumbnail_id($member->ID);
?>

<div class="member-card">
    <?= wp_get_attachment_image($image, 'member-card', attr: ['loading' => 'lazy', 'class' => 'member-card__image']) ?>
    <div class="member-card__head">
        <p class="name"><?= $member->post_title ?></p>
        <p class="job"><?= get_field('fonction', $member->ID) ?></p>
    </div>
    <p class="text"><?= get_field('description', $member->ID) ?></p>
</div>