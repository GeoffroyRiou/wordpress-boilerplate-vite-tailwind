<?php
$titre = get_field('titre');
$texte = get_field('texte');
$bouton = get_field('bouton');

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
    </div>

</section>