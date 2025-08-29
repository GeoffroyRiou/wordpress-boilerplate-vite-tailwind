<?php
$titre = get_field('titre');
$logos = get_field('logos');
?>
<section <?php echo get_block_wrapper_attributes([
                'class' => 'block-partners'
            ]) ?>>
    <div class="content g-container">

        <h2 class="g-section-title is-centered">
            <?= $titre ?>
        </h2>

        <div class="block-partners__logos">
            <?php if (!empty($logos)): ?>
                <?php foreach ($logos as $logo): ?>
                    <a href="<?= esc_url($logo['lien'] ?? '#'); ?>" class="block-partners__logo" <?= !empty($logo['lien']) ? 'target="_blank" rel="noopener"' : ''; ?>>
                        <img loading="lazy" src="<?= esc_url(wp_get_attachment_image_url($logo['logo'], 'logo')); ?>" alt="<?= esc_attr($logo['alt'] ?? ''); ?>" class="logo" />
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>