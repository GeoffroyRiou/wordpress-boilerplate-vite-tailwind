<?php
$blocs = get_field('blocs');
?>
<section <?php echo get_block_wrapper_attributes([
            'class' => 'block-cross-pages'
        ]) ?>>
    <?php if (!empty($blocs)): ?>
        <?php foreach ($blocs as $bloc): ?>
            <div class="block-cross-pages__item  <?= 'is-' . $bloc['fond'] ?>">
                <div class="block-cross-pages__item__content">
                    <h3 class="type"><?= $bloc['type'] ?></h3>
                    <h2 class="title"><?= $bloc['titre'] ?></h2>
                    <?php if (!empty($bloc['lien'])): ?>
                        <?= get_template_part('components/g-button', null, [
                            'class' => 'textbutton is-line',
                            'url' => $bloc['lien']['url'],
                            'title' => $bloc['lien']['title'],
                        ]) ?>
                    <?php endif; ?>
                </div>
                <div class="block-cross-pages__item__image">
                    <?= wp_get_attachment_image($bloc['illustration'], 'full'); ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>