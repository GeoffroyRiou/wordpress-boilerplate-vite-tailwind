<?php
$image = get_field('image');
$nom = get_field('nom');
$fonction = get_field('fonction');
$texte = get_field('texte');
$petitConteneur = get_field('petit_conteneur') ?? false;
?>
<section <?php echo get_block_wrapper_attributes([
                'class' => 'block-testimony'
            ]) ?>>

    <div class="content g-container <?= $petitConteneur ? 'is-small' : '' ?>">
        <p class="text"><?= $texte ?></p>
        <div class="block-testimony__person">
            <img src="<?= wp_get_attachment_image_url($image, 'thumbnail') ?>" alt="" class="image">
            <div class="person">
                <p class="name"><?= $nom ?></p>
                <?php if (!empty($fonction)): ?>
                    <p class="fonction"><?= $fonction ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>