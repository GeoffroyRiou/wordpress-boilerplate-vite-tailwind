<?php get_header(); ?>

<?php if (!is_front_page()): ?>
    <?= get_template_part('components/page-head', null, [
        'title' => get_the_title()
    ]) ?>
<?php endif; ?>

    <div class="cms-content">
        <?= the_content() ?>
    </div>

<?php get_footer(); ?>