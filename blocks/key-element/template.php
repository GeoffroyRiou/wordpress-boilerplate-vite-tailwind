<?php
$picto = get_field('picto');
$chiffre = get_field('chiffre');
$texte = get_field('texte');
$isPrimary = get_field('fond_primaire');
?>
<section <?php echo get_block_wrapper_attributes([
                'class' => 'block-key-element ' . ($isPrimary ? 'is-primary' : '')
            ]) ?>>
    <?php if ($picto): ?>
        <img src="<?= wp_get_attachment_image_url($picto, 'thumbnail') ?>" alt="" class="picto">
    <?php endif; ?>
    <?php if ($chiffre): ?>
        <p class="number"><?= $chiffre ?></p>
    <?php endif; ?>
    <?php if ($texte): ?>
        <p class="text"><?= $texte ?></p>
    <?php endif; ?>
</section>