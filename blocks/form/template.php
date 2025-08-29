<?php
$titre = get_field('titre');
$form = get_field('form');
?>
<section <?php echo get_block_wrapper_attributes([
                'class' => 'block-form'
            ]) ?>>
    <div class="content g-container is-small">
        <?php if (!empty($titre)): ?>
            <h2><?= $titre ?></h2>
        <?php endif; ?>

        <?= do_shortcode("[contact-form-7 id=\"$form\"]") ?>
    </div>
</section>