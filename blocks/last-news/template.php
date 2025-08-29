<?php
$titre = get_field('titre');
$texte = get_field('texte');
$illustration = get_field('illustration');
$bouton = get_field('bouton');
$texteCitation = get_field('texte_citation');

// Get last 4 news
$lastNews = get_posts([
    'post_type' => 'post',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC',
]);
?>
<section <?php echo get_block_wrapper_attributes([
                'class' => 'block-last-news'
            ]) ?>>
    <div class="content g-container">

        <div class="block-last-news__news">

            <div class="block-last-news__news__text">

                <p class="g-section-title">
                    <?= $titre ?>
                </p>

                <?= $texte ?>

                <?php if (!empty($bouton)): ?>
                    <?= get_template_part('components/g-button', null, [
                        'class' => 'textbutton is-line-dark',
                        'url' => $bouton['url'],
                        'title' => $bouton['title'],
                    ]) ?>
                <?php endif; ?>
            </div>

            <?php if (count($lastNews)): ?>
                <div class="block-last-news__news__list">
                    <div class="content">
                        <?php foreach ($lastNews as $news): ?>
                            <?= get_template_part('components/news-card', null, ['news' => $news, 'class' => 'card']) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <img src="<?= imgUrl('pattern.svg') ?>" alt="" class="block-last-news__pattern">
    </div>

    <div class="block-last-news__quote g-container">
        <p class="block-last-news__quote__text">
            <span class="content"><?= $texteCitation ?></span>
        </p>
        <?php if (!empty($illustration)): ?>
            <img loading="lazy" src="<?= wp_get_attachment_image_url($illustration, 'large') ?>" alt="" class="illustration" />
        <?php endif; ?>

        <img loading="lazy" src="<?= imgUrl('stamp-black.svg') ?>" alt="" class="block-last-news__quote__stamp">
    </div>

</section>