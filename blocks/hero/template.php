<?php
$texte = get_field('texte');
$image = get_field('image');
$lien = get_field('lien');
?>
<section <?php echo get_block_wrapper_attributes([
            'class' => 'block-hero'
        ]) ?>>
    <div class="content g-container">

        <div class="block-hero__texte">
            <?= $texte ?>

            <?php if (!empty($lien)): ?>
                <?= get_template_part('components/g-button', null, [
                    'class' => 'textbutton is-bigger',
                    'url' => $lien['url'],
                    'title' => $lien['title'],
                ]) ?>
            <?php endif; ?>
        </div>

        <div class="illustration">
            <?= wp_get_attachment_image($image, 'full'); ?>
        </div>

        <img src="<?= imgUrl('stamp.svg') ?>" alt="" class="block-hero__stamp">
    </div>
</section>