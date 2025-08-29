<?php

extract($args);

// Get first term
$terms = get_the_terms($news->ID, 'category');
$first_term = $terms[0] ?? null;

// Attachment
$image = get_post_thumbnail_id($news->ID);
?>

<article class="g-news-card <?= $class ?? '' ?>">
    <?php if (!empty($terms)): ?>
        <div class="g-news-card__types">
            <?php foreach ($terms as $term): ?>
                <p class="type"><?= $term->name ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <figure class="g-news-card__illustration">
        <?php if (!empty($image)): ?>
            <img loading="lazy" src="<?= wp_get_attachment_image_url($image, 'news-card') ?>" alt="<?= $news->post_title ?>" class="illustration" />
        <?php endif; ?>
    </figure>
    <h3 class="title"><?= $news->post_title ?></h3>
    <div class="text"><?= $news->post_excerpt ?></div>


    <?= get_template_part('components/g-button', null, [
        'url' => get_permalink($news->ID),
        'title' => 'Lire l\'article',
        'class' => 'cardbutton'
    ]) ?>
</article>