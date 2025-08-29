<?php get_header(); ?>

<?= get_template_part('components/page-head', null, [
    'title' => get_the_title()
]) ?>

<div class="cms-content">
    <?= the_content() ?>
</div>

<?php get_footer(); ?>